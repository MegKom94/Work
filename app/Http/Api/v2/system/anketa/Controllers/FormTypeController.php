<?php
namespace App\Http\Api\v2\system\anketa\Controllers;

use App\Http\Api\v2\system\anketa\Transformers\FormTypeTransformer;
use App\Http\sources\standartController;
use App\Models\FormsTypes;

use DB;
use Illuminate\Http\Request;

class FormTypeController extends standartController
{
    //вернет список FormType
    public function list()
    {
        $forms_types = FormsTypes::get();
        //возвращает трансформируемый объект (объект котрый нужно трансформировать(любой))
        return new FormTypeTransformer($forms_types, []);
    }
    public function get(FormsTypes $form_type)
    {
        return new FormTypeTransformer($form_type, []);
    }
    public function listQuestions(FormsTypes $form_type)
    {
        // $forms = $form_type->forms;
        // return new FormTransformer($forms, []);
        //возвращает трансформируемый объект (объект котрый нужно трансформировать(любой), формы чтобы добавить вопросы к форме)
        return new FormTypeTransformer($form_type, ['forms' => 'answers']);
    }
    public function statistics($form_type_id)
    {
        $form_type = FormsTypes::where('id', $form_type_id)
            //жадная загрузка- достаем ("вопросы","связку связки") ->объЯВЛЯЕМ УСЛОВИЕ ПО КОТРОЙ БУЕТ ПРОХОДИТЬ ЖАДНАЯ СВЯЗКА
            ->with([
                'forms' => function ($query) {
                    $query->withCount('allAnswersUsers');
                    $query->withCount([
                        'allAnswersUsers as count_people' => function ($query) {
                            $query->select(DB::raw('count(distinct(id_user))'));
                        }
                    ]);
                },
                'forms.answers' => function ($query) {
                    //подзапрос где происходит подсчет внутренней связки
                    $query->withCount('answersUsers');
                }
            ])
            ->first();
        // dd($form_type->toArray());
        return new FormTypeTransformer($form_type, ['forms' => ['answers_with_statistics' => ['statistics'], 'count_all_questions_users']]);
    }
    // //Связь один ко многим с моделью FormType по id=1
    // public function connection(){
    //     $result = FormType::find(1)->form;
    //     dd($result);

    // }
    public function create(Request $request, FormsTypes $form_type)
    {
        $form = $this->validateFormType($request);
        $form_type->fill($form);
        $form_type->save();

        return $this->ok();
    }
    public function edit(Request $request, FormsTypes $form_type)
    {
        $form = $this->validateFormType($request);
        $form_type->fill($form);
        $form_type->save();

        return $this->ok();
    }
    protected function validateFormType($request)
    {
        return $request->validate([
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            // 'is_stydent'=> ['required', Rule::in(0,1), 'integer'],
            // 'is_empl'=> ['required',Rule::in(0,1), 'integer'],
            // 'is_opros'=> ['required',Rule::in(0,1), 'integer'],
            // 'id_site'=> ['required',Rule::in(0,1), 'integer']
        ]);
    }
    public function delete(Request $request, FormsTypes $form_type)
    {
        $form_type->delete();

        return $this->ok();
    }
}

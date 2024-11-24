<?php

namespace App\Http\Api\v2\system\anketa\Controllers;

use App\Http\Api\v2\system\anketa\Transformers\FormAnswerTransformer;
use App\Http\sources\standartController;
use App\Models\FormsAnswers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FormAnswerController extends standartController
{
    public function list()
    {
        $answer = FormsAnswers::get();
        return new FormAnswerTransformer($answer, []);
    }
    public function get(FormsAnswers $answer)
    {
        return new FormAnswerTransformer($answer, []);
    }
    public function create(Request $request, FormsAnswers $answer)
    {
        $form = $this->validateFormAnswer($request);
        $answer->fill($form);
        $answer->form()->associate($form['id_form']);
        $answer->save();

        return $this->ok();
    }
    public function edit(Request $request, FormsAnswers $answer)
    {
        $form = $this->validateFormAnswer($request);
        $answer->fill($form);
        $answer->form()->associate($form['id_form']);
        $answer->save();

        return $this->ok();
    }
    protected function validateFormAnswer($request)
    {
        return $request->validate([
            'id_form' => ['required', 'integer'],
            'text' => ['required', 'string'],
            'is_field' => ['required', Rule::in(0, 1)],
        ]);
    }
}

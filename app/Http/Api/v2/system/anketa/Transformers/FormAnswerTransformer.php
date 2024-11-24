<?php

namespace App\Http\Api\v2\system\anketa\Transformers;

use Illuminate\Http\Request;
use App\Http\sources\Transformer;
use App\Models\FormsAnswers;

class FormAnswerTransformer extends Transformer
{
    /**
     * @param FormsAnswers $object
     * @param Request $request
     * @return array
     */
    public function transform($object, Request $request)
    {
        $response = [
            'id' => (int) $object->id,
            'text' => (string) $object->text,
            // 'id_form' => (int)$object->id_form,
            'is_field' => (int) $object->is_field
        ];

        if ($this->needAppend('statistics')) {
            $response['count_selected_answers'] = $object->answers_users()->count();
            $response['count_answers_users'] = (int) $object->answers_users_count;
            //процент кол-ва выбранного ответа от общего кол-ва ответов на вопрос
            // $all_answers_users_count = (int) $this->getNestedAppends('all_answers_users_count')[0];
            // dd($response['count_answers']//$all_answers_users_count);
            // if ($all_answers_users_count) {
            //     $response['percent_count_responses'] =  number_format(($response['count_answers'] / $all_answers_users_count * 100),2).'%';
            // } else {
            //     $response['percent_count_responses'] = 0;
            // }
            //процент кол-ва ответов от количества проголосовавших пользователей
            // $count_users= (int) $this->getNestedAppends('count_users')[0];
            // if($count_users){
            //     $response['percent_count_users'] = number_format(($response['count_answers'] /$count_users * 100),2).'%';
            // }else{
            //     $response['percent_count_users'] = 0;
            // }

        }


        return $response;
    }

}

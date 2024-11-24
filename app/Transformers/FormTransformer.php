<?php

namespace App\Transformers;

use App\Http\sources\Transformer;
use Illuminate\Http\Request;
use App\Models\Forms;

class FormTransformer extends Transformer
{
    /**
     * @param Forms $object
     * @param Request $request
     * @return array
     */
    public function transform($object, Request $request)
    {
        // dd(debug_backtrace());
        $response = [
            'id' => (int) $object->id,
            'text' => (string) $object->text,
            // 'id_type' => (int)$object->id_type,
            'weight' => (int) $object->weight,
            'mnogo' => (int) $object->mnogo,
            'is_use' => (int) $object->is_use,
            'is_show' => (int) $object->is_show,
            'is_other' => (int) $object->is_other,
            'is_subject' => (int) $object->is_subject,
            'link' => (string) $object->link,
            'is_konkurs' => (string) $object->is_konkurs,
            'id_site' => (int) $object->id_site,
            'is_deleted' => (int) $object->is_deleted,
        ];
        if ($this->needAppend('answers')) {
            $response['answers'] = (new FormAnswerTransformer(
                $object->answers,
                $this->getNestedAppends('answers')
            ))->toArray($request);
        }
        if ($this->needAppend('count_all_questions_users')) {
            // $response['count_answers'] = $object->answers_users()->count();
            // dd($object->toArray());
            // dd($object->answers_users_count);
            $response['count_answers'] = $object->all_answers_users_count;

            // $response['percentage_of_responses'] = (number_format($object->answers_users()->count()/$object->answers_users()->count()));
        }
        if ($this->needAppend('answers_with_statistics')) {
            $response['answers'] = (new FormAnswerTransformer(
                $object->answers,
                array_merge(
                    $this->getNestedAppends('answers_with_statistics'),
                    [
                        'all_answers_users_count' => $object->all_answers_users_count,
                        'count_users' => $object->count_people
                    ]
                )
            ))->toArray($request);
        }
        return $response;
    }

}

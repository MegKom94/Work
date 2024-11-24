<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisMarksResource extends JsonResource{

    function toArray($request){
        // if (isset($this->AbtSubject->toArray()[0])) {
        //     $AbtSubject = $this->AbtSubject->toArray()[0];
        // } else {
        //     $AbtSubject = [];
        //     return;
        // }
        if ($this->AbtSubjects->toArray() == []) {
            return;
         }
        return [
			'id_Marks'=>$this->id,
			'id_execution'=>$this->id_execution,
            'id_subject'=>$this->id_subject,
            'name_subject' =>$this->AbtSubjects[0]->name,
            'score'=>$this->score,
            'exam_date_fact'=>$this->exam_date_fact,
            'exam_type'=>$this->exam_type,
		];
    }
}
<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisMarksOldResource extends JsonResource{

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
			'id_comp_group'=>$this->id_comp_group,
            'id_subject'=>$this->subject_id,
            'name_subject' =>$this->AbtSubjects[0]->name,
            'mark'=>(isset($this->mark)?$this->mark:-1),
            'checked'=>(isset($this->checked)?$this->checked:0),
            'exam_date_fact'=>$this->exam_date_fact,
            'exam_type'=>$this->exam_type,
		];
    }
}
<?php
namespace App\Http\Api\v1\system\scosservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScosmarkscountScosMarksResource extends JsonResource{

    function toArray($request){
        return [
			'id'=>$this->id,
			'scos_id'=>$this->scos_id,
			'external_id'=>$this->external_id,
			'discipline'=>$this->discipline,
			'study_plan'=>$this->study_plan,
			'student'=>$this->student,
			'mark_type'=>$this->mark_type,
			'mark_value'=>$this->mark_value,
			'semester'=>$this->semester,
			'title'=>$this->title,
			'normal_mark_value'=>$this->normal_mark_value,
			'teacher'=>$this->teacher,
			'course_work_title'=>$this->course_work_title,
			'vkr_title'=>$this->vkr_title,
			'is_changed'=>$this->is_changed,
			'is_deleted'=>$this->is_deleted,
		];
    }
}
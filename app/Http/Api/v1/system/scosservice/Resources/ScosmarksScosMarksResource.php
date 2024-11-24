<?php
namespace App\Http\Api\v1\system\scosservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScosmarksScosMarksResource extends JsonResource{

    function toArray($request){
		$scos_id = ($this->scos_id != '' ? $this->scos_id : '-');

		// if($this->mark_type == 'CREDIT'){
		// 	$markValue = ($this->mark_value == 1 ? 'PASSED' : 'FAILED');
		// }

		return [
			'id'=>$this->id,
			'scos_id'=>$scos_id,
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
		];
    }
}
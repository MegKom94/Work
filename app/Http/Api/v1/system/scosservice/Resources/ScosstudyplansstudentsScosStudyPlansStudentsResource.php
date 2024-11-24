<?php
namespace App\Http\Api\v1\system\scosservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScosstudyplansstudentsScosStudyPlansStudentsResource extends JsonResource{

    function toArray($request){
		$scos_id = ($this->scos_id != '' ? $this->scos_id : '-');

        return [
			'id'=>$this->id,
			'external_id'=>$this->external_id,
			'scos_id'=>$scos_id,
			'study_plan'=>$this->study_plan,
			'student'=>$this->student,
			'start_period'=>$this->start_period,
			'end_period'=>$this->end_period,
			'is_changed'=>$this->is_changed,
		];
    }
}
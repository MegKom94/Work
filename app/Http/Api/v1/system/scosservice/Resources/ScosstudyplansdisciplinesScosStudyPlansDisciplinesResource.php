<?php
namespace App\Http\Api\v1\system\scosservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScosstudyplansdisciplinesScosStudyPlansDisciplinesResource extends JsonResource{

    function toArray($request){
		$scos_id = ($this->scos_id != '' ? $this->scos_id : '-');

        return [
			'id'=>$this->id,
			'external_id'=>$this->external_id,
			'scos_id'=>$scos_id,
			'study_plan'=>$this->study_plan,
			'discipline'=>$this->discipline,
			'semester'=>$this->semester,
			'title'=>$this->title,
			'mark_type'=>$this->mark_type,
			'credits'=>$this->credits,
			'hours'=>$this->hours,
			'teachers'=>$this->teachers,
			'kind'=>$this->kind,
			'code_selective'=>$this->code_selective,
			'code_speciality'=>$this->code_speciality,
			'is_changed'=>$this->is_changed,
		];
    }
}
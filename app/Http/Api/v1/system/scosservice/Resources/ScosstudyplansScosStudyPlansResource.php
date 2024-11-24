<?php
namespace App\Http\Api\v1\system\scosservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScosstudyplansScosStudyPlansResource extends JsonResource{

    function toArray($request){
		$scos_id = ($this->scos_id != '' ? $this->scos_id : '-');

        return [
			'id'=>$this->id,
			'scos_id'=>$scos_id,
			'external_id'=>$this->external_id,
			'educational_program'=>$this->educational_program,
			'title'=>$this->title,
			'direction'=>$this->direction,
			'code_direction'=>$this->code_direction,
			'start_year'=>$this->start_year,
			'end_year'=>$this->end_year,
			'education_form'=>$this->education_form,
			'is_base'=>$this->is_base,
			'period_type'=>$this->period_type,
			'period_count'=>$this->period_count,
			'credits'=>$this->credits,
			'hours'=>$this->hours,
			'current_semester'=>$this->current_semester,
			'begindate'=>$this->begindate,
			'enddate'=>$this->enddate,
			'is_changed'=>$this->is_changed,
		];
    }
}
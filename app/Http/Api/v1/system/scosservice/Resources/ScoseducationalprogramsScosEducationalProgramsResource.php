<?php
namespace App\Http\Api\v1\system\scosservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScoseducationalprogramsScosEducationalProgramsResource extends JsonResource{

    function toArray($request){
		$scos_id = ($this->scos_id != '' ? $this->scos_id : '-');

        return [
			'id'=>$this->id,
			'scos_id'=>$scos_id,
			'external_id'=>$this->external_id,
			'title'=>$this->title,
			'direction'=>$this->direction,
			'code_direction'=>$this->code_direction,
			'start_year'=>$this->start_year,
			'end_year'=>$this->end_year,
			'is_changed'=>$this->is_changed,
		];
    }
}
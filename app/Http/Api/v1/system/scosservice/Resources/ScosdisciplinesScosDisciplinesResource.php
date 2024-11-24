<?php
namespace App\Http\Api\v1\system\scosservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScosdisciplinesScosDisciplinesResource extends JsonResource{

    function toArray($request){
		$scos_id = ($this->scos_id != '' ? $this->scos_id : '-');

        return [
			'id'=>$this->id,
			'scos_id'=>$scos_id,
			'external_id'=>$this->external_id,
			'title'=>$this->title,
			'discipline_type'=>$this->discipline_type,
			'is_changed'=>$this->is_changed,
		];
    }
}
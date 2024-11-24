<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompetitionsLevelsResource extends JsonResource{

    function toArray($request){
		
        return [
			'Level'=>$this->Levels
		];
    }
}
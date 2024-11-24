<?php
namespace App\Http\Api\v1\system\admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiModelsExResource extends JsonResource{
    function toArray($request){
        return [
			'name_model'=>$this->name_model,
		];
    }
}
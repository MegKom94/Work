<?php
namespace App\Http\Api\v1\system\admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\admin\Resources\InformationSchemaResource;

class ModelsApiModelsResource extends JsonResource{

    function toArray($request){
        return [
			'id'=>$this->id,
			'name_model'=>$this->name_model,
			'name_table'=>$this->name_table,
			'InformationSchema'=>InformationSchemaResource::collection($this->InformationSchema),
		];
    }
}
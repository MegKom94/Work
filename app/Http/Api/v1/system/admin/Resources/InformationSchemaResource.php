<?php
namespace App\Http\Api\v1\system\admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\admin\Resources\ApiModelsExResource;

class InformationSchemaResource extends JsonResource{
    function toArray($request){
        $isExists = (ApiModelsExResource::collection($this->ApiModelsRef) !== [] && isset($this->REFERENCED_TABLE_SCHEMA) && isset($this->ApiModels[0]));
        $isExistsRef = (ApiModelsExResource::collection($this->ApiModels) !== [] && isset($this->REFERENCED_TABLE_SCHEMA) && isset($this->ApiModelsRef[0]));

        if($isExists && $isExistsRef)
            return [
                'relationship'=> $this->TABLE_SCHEMA.'.'.$this->ApiModels[0]->name_model.'.'.$this->COLUMN_NAME,
                'relationship_ref'=> $this->REFERENCED_TABLE_SCHEMA.'.'.$this->ApiModelsRef[0]->name_model.'.'.$this->REFERENCED_COLUMN_NAME,
            ];
    }
}
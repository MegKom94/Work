<?php
namespace App\Http\Api\v1\system\admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SystemApiEntitiesResource extends JsonResource{

    function toArray($request){
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'id_system'=>$this->id_system,
            'id_main_model'=>$this->id_main_model,
            'main_model'=>$this->ApiModels->toArray()[0]['name_model'],
        ];
    }
}
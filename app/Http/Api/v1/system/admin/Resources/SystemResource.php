<?php
namespace App\Http\Api\v1\system\admin\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\admin\Resources\SystemApiEntitiesResource;

class SystemResource extends JsonResource{

    function toArray($request){
        return [
            'id'=>$this->id,
            'name_ru'=>$this->user_id,
            'name'=>$this->name_en,
            'description'=>$this->description,
            'link'=>$this->link,
            'id_group'=>$this->id_group,
            'ApiEntities'=>SystemApiEntitiesResource::collection($this->ApiEntities),
        ];
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppForChangeOurSuperServiceLogsResource extends JsonResource{
    
    function toArray($request){

        return [
            'id'=>$this->id,
            'entity'=>$this->entity,
            'id_jwt'=>$this->id_jwt,
        ];
    }
}
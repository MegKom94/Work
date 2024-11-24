<?php
namespace App\Http\Api\v1\system\profile\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExecutionUserPositionResource extends JsonResource{
    
    function toArray($request){
        return [
            'id_position'=>$this->id,
            'name'=>$this->name,
            'is_deleted'=>$this->is_deleted,
        ];
    }
}
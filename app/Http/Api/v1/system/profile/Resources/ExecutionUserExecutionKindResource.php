<?php
namespace App\Http\Api\v1\system\profile\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExecutionUserExecutionKindResource extends JsonResource{
    
    function toArray($request){
        return [
            'id_kind'=>$this->id,
            'name'=>$this->name,
            'kind_create'=>$this->date_create,
            'is_deleted'=>$this->is_deleted,
        ];
    }
}
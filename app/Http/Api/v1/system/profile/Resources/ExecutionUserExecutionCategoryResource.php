<?php
namespace App\Http\Api\v1\system\profile\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExecutionUserExecutionCategoryResource extends JsonResource{
    
    function toArray($request){
        return [
            'id_category'=>$this->id,
            'name'=>$this->name,
            'category_create'=>$this->date_create,
            'is_deleted'=>$this->is_deleted,
        ];
    }
}
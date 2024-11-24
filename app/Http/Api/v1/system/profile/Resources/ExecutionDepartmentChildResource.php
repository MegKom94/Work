<?php
namespace App\Http\Api\v1\system\profile\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\profile\Resources\ExecutionDepartmentParentResource;

class ExecutionDepartmentChildResource extends JsonResource{
    
    function toArray($request){
        return [
            'id_department'=>$this->id,
            'code'=>$this->code,
            'name'=>$this->name,
            'is_deleted'=>$this->is_deleted,
            'parent'=>ExecutionDepartmentParentResource::collection($this->Department),
        ];
    }
}
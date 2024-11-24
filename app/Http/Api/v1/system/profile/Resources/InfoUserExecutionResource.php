<?php
namespace App\Http\Api\v1\system\profile\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\profile\Resources\InfoDepartmentResource;

class InfoUserExecutionResource extends JsonResource{
    
    function toArray($request){
        if($this->Department->toArray() != []){
            return [
                'Department'=>InfoDepartmentResource::collection($this->Department),
            ];
        }
    }
}
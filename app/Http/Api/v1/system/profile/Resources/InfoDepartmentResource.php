<?php
namespace App\Http\Api\v1\system\profile\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoDepartmentResource extends JsonResource{
    
    function toArray($request){
        
        return [
            'id_department'=>$this->id,
        ];
    }
}
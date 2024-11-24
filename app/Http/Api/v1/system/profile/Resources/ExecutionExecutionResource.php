<?php
namespace App\Http\Api\v1\system\profile\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\profile\Resources\ExecutionDepartmentChildResource;
use App\Http\Api\v1\system\profile\Resources\ExecutionUserExecutionKindResource;
use App\Http\Api\v1\system\profile\Resources\ExecutionUserExecutionCategoryResource;
use App\Http\Api\v1\system\profile\Resources\ExecutionUserStudyGroupResource;
use App\Http\Api\v1\system\profile\Resources\ExecutionUserPositionResource;

class ExecutionExecutionResource extends JsonResource{
    
    function toArray($request){
        return [
            'id_exec'=>$this->id,
            'personal_number'=>$this->personal_number,
            'exec_begin'=>$this->date_begin,
            'exec_end'=>$this->date_end,
            'rate'=>$this->rate,
            'is_deleted'=>$this->is_deleted,
            'position'=> ($this->UserStudyGroup->toArray() !== [] ? ExecutionUserStudyGroupResource::collection($this->UserStudyGroup) : ExecutionUserPositionResource::collection($this->UserPosition)),
            'UserExecutionCategory'=>ExecutionUserExecutionCategoryResource::collection($this->UserExecutionCategory),
            'UserExecutionKind'=>ExecutionUserExecutionKindResource::collection($this->UserExecutionKind),
            'Department'=>ExecutionDepartmentChildResource::collection($this->Department),
        ];
    }
}
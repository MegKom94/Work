<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfirmedAppCompGroupsResource extends JsonResource{
    
    function toArray($request){
        if($this->whenLoaded('DocsStudy')->toArray() == [] OR $this->whenLoaded('DocsIdentity')->toArray() == []) return;


        return [
            'id_App'=>$this->id,
            'id_UserExecution'=>$this->id_execution,
            'CompGroups'=>$this->whenLoaded('CompGroups'),
        ];
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\superservice\Resources\AppForChangeCompGroupsResource;

class AppForChangeResource extends JsonResource{
    function toArray($request){
        $docs = $this->whenLoaded('UserExecution')->toArray();

        if(isset($docs[0]) && isset($docs[0]['docs'])) $docs = $docs[0]['docs'];
        else $docs = [];
        
        return [
            'id_App'=>$this->id,
            'id_execution'=>$this->id_execution,
            'is_need_hostel'=>$this->is_need_hostel,
            'is_first_edu'=>$this->is_first_edu,
            'is_test'=>$this->is_test,
            'guid_app'=>$this->guid_app,
            'is_deleted'=>$this->is_deleted,
            'CompGroups'=>AppForChangeCompGroupsResource::collection($this->whenLoaded('CompGroups')),
            'Docs'=> $docs,
		];
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppForChangeCompGroupsResource extends JsonResource{
    function toArray($request){        
        return [
            'id_CompGroups'=>$this->id,
            'id_competition'=>$this->id_competition,
            'id_target_org'=>$this->id_target_org,
            'priority'=>$this->priority,
            'id_status'=>$this->id_status,
            'GuidCompetitiveGroup'=>$this->guid_comp_group,
            'date_create'=>$this->date_create,
            'is_deleted'=>$this->is_deleted,
            //'CompGroupsStatuses'=>$this->CompGroupsStatuses,
		];
    }
}
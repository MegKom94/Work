<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompetitionsGroupsResource extends JsonResource{
    
    function toArray($request){

        return [
            'id_CompGroups'=>$this->id, 
            'id_app'=>$this->id_app, 
            'id_competition'=>$this->id_competition,
            'id_target_org'=>$this->id_target_org,
            'id_order'=>$this->id_order,
            'priority'=>$this->priority,
            'id_status'=>$this->id_status,
            'guid_comp_group'=>$this->guid_comp_group,
        ];
    }
}
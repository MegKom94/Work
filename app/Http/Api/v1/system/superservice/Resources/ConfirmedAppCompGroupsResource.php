<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfirmedAppCompGroupsResource extends JsonResource{
    
    function toArray($request){

        if(!in_array($this->whenLoaded('Competitions')[0]->id_type, [1, 2])) return;

        return [
            'id_CompGroups'=>$this->id,
            'id_target_org'=>$this->id_target_org == 0 ? null: $this->id_target_org,
            'guid_comp_group'=>$this->guid_comp_group,
        ];
    }
}
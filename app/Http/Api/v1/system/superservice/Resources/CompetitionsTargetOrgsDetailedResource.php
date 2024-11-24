<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompetitionsTargetOrgsDetailedResource extends JsonResource{
    function toArray($request){
        $competitions = $this->whenLoaded('Competitions')->toArray();
        if(isset($competitions[0])) $competitions = $competitions[0];


        return [
            'detailed_'.$competitions['id_direction']. '_'.$this->id_group.'_'.$this->id_org
        ];
        // return[
        //     'UidDictionaryValue'=>  'detailed_'.$competitions['id_direction']. '_'.$this->id_group.'_'.$this->id_org,
        // ];
    }
}
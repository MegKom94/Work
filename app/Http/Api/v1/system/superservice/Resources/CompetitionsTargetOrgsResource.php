<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompetitionsTargetOrgsResource extends JsonResource{
    function toArray($request){
        return 'detailed_'.'7'.'_'.$this->id_group.'_'.$this->id_org;
    }
}
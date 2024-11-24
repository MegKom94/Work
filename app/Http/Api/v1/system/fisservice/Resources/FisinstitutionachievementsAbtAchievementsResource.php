<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\fisservice\Resources\FisinstitutionachievementsCampaignsResource;

class FisinstitutionachievementsAbtAchievementsResource extends JsonResource{

    function toArray($request){
        $Campaign = FisinstitutionachievementsCampaignsResource::collection($this->whenLoaded('Campaigns'));
        if($this->whenLoaded('Campaigns')->toArray() == []) return; 
        return [
            'uid' => "Institutional_achievement_" . $Campaign[0]['year'] . "_" . $this->id . "_" . (isset($this->id_level)?$this->id_level:$this->level) . "_" . $this->id_fisservice,
            'id'=>$this->id,
            'title'=>$this->title,
            'name'=>$this->name,

            'id_level'=>$this->id_level,

            'level'=>$this->level,
            'ball' => $this->ball,

            'id_fisservice'=>$this->id_fisservice,
            'max_score'=>$this->max_score,
            'is_deleted'=>$this->is_deleted,
            'Campaigns'=>FisinstitutionachievementsCampaignsResource::collection($this->whenLoaded('Campaigns')),//$this->Campaigns
		];
    }
}
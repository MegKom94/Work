<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FiscompetitiongroupsCampaignsResource extends JsonResource{
    function toArray($request){
        
        return [
            "year_campaigns"=> $this->year,
            "id_level_campaigns"=> $this->id_level,
            "uid_campaigns_fis"=> $this->fis_uid,
            "id_head_fisservice"=> $this->id_head_fisservice,

		];
    }
}
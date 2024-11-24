<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisinstitutionachievementsCampaignsResource extends JsonResource{

    function toArray($request){
        return [
            'year'=>$this->year,
            'fis_uid'=>$this->fis_uid,
		];
    }
}
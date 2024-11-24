<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuperservicecampaigneventAbtDatesResource extends JsonResource{

    function toArray($request){
        return [
			'stage_date'=>$this->stage_date,
			'id_type'=>$this->id_type,
			'year'=>$this->year,
			'id_abt_config'=>$this->id_abt_config,
			'level'=>$this->level,
			'education_form'=>$this->education_form,
			'payment_type'=>$this->payment_type,
		];
    }
}
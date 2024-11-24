<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdmissioncontrolnumbersAbtProfilesResource extends JsonResource{

    function toArray($request){

        
        return [
			'profile_'.$this->id_direction.'_'.$this->id,
            'title1'=>$this->title_1,
            'title2'=>$this->title_2,
		];
    }
}
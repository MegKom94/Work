<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdmissioncontrolnumbersDirectionResource extends JsonResource{
    function toArray($request){
		$profile = [];

		if($this->title_1 != ''){
			array_push($profile, [
				'profile_'.$this->id.'_'.$this->id_profile.'_1'
			]);
		}
		if($this->title_2 != ''){
			array_push($profile, [
				'profile_'.$this->id.'_'.$this->id_profile.'_2'
			]);
		}

        return [
			'Uid'=>'direction_'.$this->id.($profile != [] ? '_profile_'.$this->id_profile : ''),
			'IdDirection'=>$this->id_superservice,
			'Profiles'=>$profile,
		];	
    }
}
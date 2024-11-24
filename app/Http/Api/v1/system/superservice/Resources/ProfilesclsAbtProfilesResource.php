<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfilesclsAbtProfilesResource extends JsonResource{

    function toArray($request){
		$response = 
		[
			[
				'id'=>'profile_'.$this->id_direction.'_'.$this->id.'_1',
				'IdDictionaryType'=>6,
				'title'=>$this->title_1,
			]
		];

		if($this->title_2 != ''){
			array_push($response, [
				'id'=>'profile_'.$this->id_direction.'_'.$this->id.'_2',
				'IdDictionaryType'=>6,
				'title'=>$this->title_2,
			]);
		}

		return $response;
    }
}
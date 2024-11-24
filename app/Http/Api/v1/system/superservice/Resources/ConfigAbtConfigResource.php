<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfigAbtConfigResource extends JsonResource{

    function toArray($request){
        return [
			'id'=>$this->id,
			'year'=>$this->year,
			'date_begin'=>$this->date_begin,
			'date_end'=>$this->date_end,
			'k_list_day'=>$this->k_list_day,
			'k_list_time'=>$this->k_list_time,
			'k_list_day_check'=>$this->k_list_day_check,
			'k_list_time_check'=>$this->k_list_time_check,
			'superservice_session_key'=>$this->superservice_session_key,
			'superservice_session_key_test'=>$this->superservice_session_key_test,
			'is_active'=>$this->is_active,
		];
    }
}
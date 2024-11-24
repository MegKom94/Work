<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FistargetorgsTargetOrgsResource extends JsonResource{

    function toArray($request){
        return [
			'id'=>$this->id,
			'name'=>$this->name,
			'descr'=>$this->descr,
			'is_contract'=>$this->is_contract,
			'contract_number'=>$this->contract_number,
			'contract_begin'=>$this->contract_begin,
			'ogrn'=>$this->ogrn,
			'kpp'=>$this->kpp,
			'name_emp'=>$this->name_emp,
			'ogrn_emp'=>$this->ogrn_emp,
			'kpp_emp'=>$this->kpp_emp,
			'region'=>$this->region,
			'count'=>$this->count,
			'is_deleted'=>$this->is_deleted,
			'show'=>$this->show,
			'year'=>$this->year,
		];
    }
}
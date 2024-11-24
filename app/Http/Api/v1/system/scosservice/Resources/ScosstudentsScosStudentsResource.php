<?php
namespace App\Http\Api\v1\system\scosservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScosstudentsScosStudentsResource extends JsonResource{

    function toArray($request){
        $surname = ($this->surname != '' ? $this->surname : '-');
        $name = ($this->name != '' ? $this->name : '-');
        $middle_name = ($this->middle_name != '' ? $this->middle_name : '-');
        $scos_id = ($this->scos_id != '' ? $this->scos_id : '-');
        
        return [
            'id'=>$this->id,
			'scos_id'=>$scos_id,
            'external_id'=>$this->external_id,
            'study_year'=>$this->study_year,
            'surname'=>$surname,
            'name'=>$name,
            'middle_name'=>$middle_name,
            'inn'=>$this->inn,
            'email'=>$this->email,
            'citizenship'=>$this->citizenship,
            'is_changed'=>$this->is_changed,
		];
    }
}
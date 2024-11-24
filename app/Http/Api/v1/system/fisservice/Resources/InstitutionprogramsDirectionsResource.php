<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class InstitutionprogramsDirectionsResource extends JsonResource{
    function toArray($request){
        return [
            'name'=>$this->name,
            // 'name' => "lasania",
            'code'=> $this->code,
		];
    }
}
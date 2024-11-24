<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LogsFisServiceLogsResource extends JsonResource{

    function toArray($request){
        return [
            'id'=>$this->id,
            'PackageID'=>$this->PackageID,
            'InstitutionID'=>$this->InstitutionID,
            'answer_text'=>$this->answer_text,
		];
    }
}
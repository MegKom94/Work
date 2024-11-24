<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FiscompetitiongroupsCgExamsAbtSubjectsResource extends JsonResource{

    function toArray($request){
        return [
            "subject_name"=>$this->name,
            "fis_id"=>$this->fis_id,
        ];
    }
}
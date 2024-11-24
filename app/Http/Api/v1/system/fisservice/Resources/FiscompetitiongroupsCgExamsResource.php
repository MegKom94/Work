<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\fisservice\Resources\FiscompetitiongroupsCgExamsAbtSubjectsResource;

class FiscompetitiongroupsCgExamsResource extends JsonResource{

    function toArray($request){
        return [
            "id"=>$this->id,
            "id_profile"=>$this->id_profile,
            "subject_id"=>$this->subject_id,
            "min_ball"=>$this->min_ball,
            "priority"=>$this->priority,
            "is_spo"=>$this->is_spo,
            "is_en"=>$this->is_en,

            "AbtSubjects"=>FiscompetitiongroupsCgExamsAbtSubjectsResource::collection($this->AbtSubjects),
        ];
    }
}
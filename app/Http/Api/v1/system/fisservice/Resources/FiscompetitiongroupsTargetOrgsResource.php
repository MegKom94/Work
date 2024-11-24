<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
// use App\Http\Api\v1\system\fisservice\Resources\FiscompetitiongroupsCgExamsAbtSubjectsResource;

class FiscompetitiongroupsTargetOrgsResource extends JsonResource{

    function toArray($request){
       
        if (!isset($this->id_org)) {
           return;
        }
        return [
            // "TargetOrganization" => [
                "UID" => ($this->id_org > 0? "target_org_" . $this->id_org : ""),
                "ContractUID" => ($this->id_org > 0? "target_org_" . $this->id_org : ""),
            // ]
        ];
    }
}
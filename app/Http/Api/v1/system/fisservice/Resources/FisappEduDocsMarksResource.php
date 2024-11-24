<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

// use App\Http\Api\v1\system\fisservice\Resources\FisappEduDocsMarksResource;


class FisappEduDocsMarksResource extends JsonResource
{
    function toArray($request)
    {
        if (!isset($this->score)) {
            return;
        }
        return [
            "SubjectID" => $this->id_subject,
            "Value" => $this->score,
        ];
    }
}

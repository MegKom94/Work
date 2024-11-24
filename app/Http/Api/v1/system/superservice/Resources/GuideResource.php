<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GuideResource extends JsonResource{

    function toArray($request){
        return [
            'doc_type'=>$this->doc_type,
        ];
    }
}
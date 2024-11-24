<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountAppResource extends JsonResource{

    function toArray($request){
        return [
            'SuperServiceLogs'=>$this->SuperServiceLogs,
		];
    }
}
<?php
namespace App\Http\Api\v1\system\scosservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScosuserinfoScosStudyPlansResource extends JsonResource{

    function toArray($request){

        return [
			'Marks'=>$this->whenLoaded('ScosMarks')
		];
    }
}
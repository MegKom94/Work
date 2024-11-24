<?php
namespace App\Http\Api\v1\system\scosservice\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\scosservice\Resources\ScosuserinfoScosMarksResource;

class ScosuserinfoScosStudentsResource extends JsonResource{

    function toArray($request){

        return ScosuserinfoScosMarksResource::collection($this->whenLoaded('ScosMarks'));
    }
}
<?php
namespace App\Http\Api\v1\system\profile\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoUserExpResource extends JsonResource{
    
    function toArray($request){
        return [
            'expAll'=>$this->exp,
            'expTeach'=>$this->exp_pgu,
            'expScience'=>$this->exp_science, 
        ];
    }
}
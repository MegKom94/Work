<?php
namespace App\Http\Api\v1\system\profile\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoUserAddResource extends JsonResource{
    
    function toArray($request){
        return [
            'placeBirth'=>$this->place_birth,
            'biographyRu'=>$this->biography,
            'biographyEn'=>$this->biography_en, 
        ];
    }
}
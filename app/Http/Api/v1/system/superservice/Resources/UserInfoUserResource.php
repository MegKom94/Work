<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInfoUserResource extends JsonResource{
    
    function toArray($request){
        $login = ($this->login != '' ? $this->login :'-');
        return [
            'login'=>$login,        
        ];
    }
}
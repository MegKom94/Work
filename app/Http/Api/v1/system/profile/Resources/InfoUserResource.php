<?php
namespace App\Http\Api\v1\system\profile\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\profile\Resources\InfoUserAddResource;
use App\Http\Api\v1\system\profile\Resources\InfoUserExpResource;
use App\Http\Api\v1\system\profile\Resources\InfoUserExecutionResource;

class InfoUserResource extends JsonResource{
    
    function toArray($request){
        return [
            'id_user'=>$this->id,
            'fio'=>$this->lastname.' '.$this->firstname.' '.$this->secondname,
            'login'=>$this->login,
            'birthdate'=> $this->bd,
            'personalPhone'=>$this->tel,
            'workPhone'=>$this->tel_work,
            'email'=>$this->email,
            'gender'=>$this->sex, 
            'number'=>$this->code,
            'photo'=>$this->photo,
            'image'=>$this->image,
            'UserAdd'=>InfoUserAddResource::collection($this->UserAdd),
            'UserExp'=>InfoUserExpResource::collection($this->UserExp),
            'Department'=>InfoUserExecutionResource::collection($this->UserExecution),
        ];
    }
}
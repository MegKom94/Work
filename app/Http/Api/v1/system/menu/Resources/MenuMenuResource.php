<?php
namespace App\Http\Api\v1\system\menu\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuMenuResource extends JsonResource{

    function toArray($request){
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'descr'=>$this->descr,
            'id_page'=>$this->id_page,
            'id_parent'=>$this->id_parent,
            'style'=>$this->style,
            'weight'=>$this->weight,
            'url'=>$this->url,
            'id_user'=>$this->id_user,
            'id_group'=>$this->id_group,
            'rights'=>$this->rights,
            'id_module'=>$this->id_module,
            'position'=>$this->position,
            'id_domen'=>$this->id_domen,
            'color'=>$this->color,
            'lng'=>$this->lng,
            'date_create'=>$this->date_create,
            'is_hidden'=>$this->is_hidden,
            'is_deleted'=>$this->is_deleted,
            'Menu'=>$this->Menu,
		];
    }
}
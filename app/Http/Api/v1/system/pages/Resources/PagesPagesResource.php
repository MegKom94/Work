<?php
namespace App\Http\Api\v1\system\pages\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PagesPagesResource extends JsonResource{

    function toArray($request){
        return [
            'id'=>$this->id,
            'content'=>$this->content,
            'url'=>$this->url,
            'link'=>$this->link,
            'annotation'=>$this->annotation,
            'name'=>$this->name,
		];
    }
}
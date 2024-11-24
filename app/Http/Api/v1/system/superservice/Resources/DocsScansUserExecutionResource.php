<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocsScansUserExecutionResource extends JsonResource{
    
    function toArray($request){
        $app = $this->whenLoaded('App');
        if($app->isEmpty()) return;

        
        return [
            'id_execution'=>$this->id,
        ];
    }
}
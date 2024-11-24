<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountlogsSuperServiceLogsResource extends JsonResource{

    function toArray($request){
        return [
			'id'=>$this->id,
			'id_user'=>$this->id_user,
			'entity'=>$this->entity,
			'id_jwt'=>$this->id_jwt,
			'answer'=>$this->answer,
			'status'=>$this->status,
			'date'=>$this->date,
			'guid_app'=>$this->guid_app,
		];
    }
}
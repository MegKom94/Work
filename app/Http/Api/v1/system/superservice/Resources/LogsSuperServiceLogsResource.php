<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LogsSuperServiceLogsResource extends JsonResource{

    function toArray($request){
        return [
            'id_SuperServiceLogs'=>$this->id,
            'id_user'=>$this->id_user,
            'entity'=>$this->entity,
            'id_jwt'=>$this->id_jwt,
            'answer'=>$this->answer,
            'status'=>$this->status,
            'guid_app'=>$this->guid_app,
            'date'=>$this->date,
            //'App'=>$this->App,

            //'id_exec'=>$this->App[0]->id_exec,
        ];
    }
}
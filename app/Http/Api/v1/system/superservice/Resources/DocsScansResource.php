<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\superservice\Resources\DocsScansDocsResource;
use App\Http\Api\v1\system\superservice\Resources\AppForChangeOurSuperServiceLogsResource;
use App\Http\Api\v1\system\superservice\Resources\DocsScansUserExecutionResource;
use App\Http\sources\Mixin;


class DocsScansResource extends JsonResource{
    use Mixin;

    function toArray($request){

        $userExecution = DocsScansUserExecutionResource::collection($this->UserExecution);

        $docs = DocsScansDocsResource::collection($this->Docs);
        
        if($docs->isEmpty() || self::searchKey('id_execution', json_decode($userExecution->toJson(), true)) === false) return;


        return [
            //'lastname'=>$this->lastname,
            'id_user'=>$this->id,
            'guid_entrant'=>$this->guid_entrant,
            'Docs'=>$docs,
            'SuperServiceLogs'=>AppForChangeOurSuperServiceLogsResource::collection($this->SuperServiceLogs),
        ];
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OriginalDocumentResource extends JsonResource{

    function toArray($request){
        return [
            'id_user'=>$this->id_user,
            'guid_entrant'=>$this->guid_entrant,
            'id_App'=>$this->id_app,
            'is_original'=>$this->is_original,
            'date'=>date("Y-m-d\TH:i:s+03:00", $this->date),
        ];
    }
}
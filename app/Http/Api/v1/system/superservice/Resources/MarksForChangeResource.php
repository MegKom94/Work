<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MarksForChangeResource extends JsonResource{
    
    function toArray($request){
        return[
            'id_MarksOld'=>$this->id_MarksOld,
            'etime'=>$this->etime,
            'date_plan'=>strtotime($this->date_plan),
        ];
    }
}

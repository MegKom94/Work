<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisPrevDocsEgeResource extends JsonResource
{

    function toArray($request)
    {


        if ($this->id_protected == null) {
            return;
        }
        if (isset($this->id_protected) && $this->id_type == 172) {
            return [
                'id_protected' => $this->id_protected,
            ];
        }else {
            return;
        }
        
    }
}

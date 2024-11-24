<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocsScansDocsResource extends JsonResource{
    
    function toArray($request){

        if(!$this->AbtScans->isEmpty() || $this->id_type == 104) return;

        $type = 8;
        if(in_array($this->id_type, [1, 2, 3, 5, 10, 193])){
            //док-т удостовер личность
            $type = 1;
        }
        if(in_array($this->id_type, [20, 21, 22, 122, 123])){
            //док-т об образовании
            $type = 2;

            if($this->number == '') return;
        }
        if(in_array($this->id_type, [28, 48, 49, 50, 51, 52, 53, 54, 55])){
            //док-т удостовер сир инв и вет
            $type = 3;
        }
        

        return [
            // 'doc_type'=>$this->id_type,
            'id_Docs'=>$this->id,
            'id_type'=>$type,
            'date_begin'=>date('Y-m-d', $this->date_begin),
            'guid_doc'=>$this->guid_doc,
        ];
    }
}
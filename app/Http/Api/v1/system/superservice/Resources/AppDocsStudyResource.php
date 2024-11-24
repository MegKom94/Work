<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppDocsStudyResource extends JsonResource{
    
    function toArray($request){
        
        if(isset($this->Schools[0])) $org = $this->Schools[0]->name;
        $org = $this->dop_info1;
        

        $type = explode('_', $this->DocsTypes[0]->id_superservice);
        //if(isset($type[0])) $type = $type[0];

        
        return [
            'idDocumentType'=>$type[0],
            'DocName'=>$this->DocsTypes[0]->name,
            'DocSeries'=>$this->series,
            'DocNumber'=>$this->number,
            'date_begin'=>date('Y-m-d', $this->date_begin),
            'DocOrganization'=>$org,
            'IdCheckStatus'=>4,
        ];
    }
}
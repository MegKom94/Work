<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocsForChangeResource extends JsonResource{
    
    function toArray($request){
        // if($this->id_protected == '') $this->id_protected = '-';
        // if($this->series == '') $this->series = '-';
        // if($this->number == '') $this->number = '-';
        // if($this->dop_info1 == '') $this->dop_info1 = '-';
        // if($this->dop_info2 == '') $this->dop_info2 = '-';
        // if($this->dop_info3 == '') $this->dop_info3 = '-';
        // if($this->id_AbtAchievements == '') $this->id_AbtAchievements = '-';
        // if($this->id_ach == '') $this->id_ach = '-';


        
        return [
            'id_user'=>$this->id_user,
            'id_execution'=>$this->id_execution,
            'id_identity_doc'=>$this->id_identity_doc,
            'id_Docs'=>$this->id,
            'id_type'=>$this->id_type,
            'id_protected'=>$this->id_protected,
            'series'=>$this->series,
            'number'=>$this->number,
            'dop_info1'=>$this->dop_info1,
            'dop_info2'=>$this->dop_info2,
            'dop_info3'=>$this->dop_info3,
            'date_begin'=>$this->date_begin,
            'guid_doc'=>$this->guid_doc,
            'id_status_superservice'=>$this->id_status_superservice,
            'date_change'=>strtotime($this->version),
            'AbtAchievements'=>[
                'id_AbtAchievements'=>$this->id_AbtAchievements,
                'id_ach'=>$this->id_ach,
            ],
        ];

    }
}
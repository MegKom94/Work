<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class EntranceTestAdmissionCompetitionsResource extends JsonResource{
    function toArray($request){

        if(!isset($this->UidReplaceEntranceTest)) $this->UidReplaceEntranceTest = '';
        
        $idEntranceTestType = '';
        if(in_array($this->IdSubject, [1475, 1499])) {
            $idEntranceTestType = "2";
        } else {
            if($this->is_foreign == 0) {
                $idEntranceTestType = "4";
            } else {
                $idEntranceTestType = "7";
            }
        }

        return [
            'UidCompetition'=>$this->UidCompetition,
            'id_type'=>$this->id_type,
            'IdEntranceTestLanguage'=>($this->is_en == 0 ? 1 : 2),
            'IdEntranceTestType'=>$idEntranceTestType,
            'is_foreign'=>$this->is_foreign,
            'Uid'=>$this->Uid,
            'MinScore'=>$this->MinScore,
            'IdSubject'=>$this->IdSubject,
            'Priority'=>$this->Priority,
            'is_option'=>$this->is_option,
            'is_main'=>$this->is_main,
            'is_spo'=>$this->is_spo,
            'UidReplaceEntranceTest'=>$this->UidReplaceEntranceTest,
        ];
    }
}
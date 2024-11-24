<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SuperservicetargetorgsTargetOrgsResource extends JsonResource{

    function toArray($request){

		if(isset($this->ogrn)) $ogrn = $this->ogrn;
		else $ogrn = '-';
		
		if(isset($this->kpp)) $kpp = $this->kpp;
		else $kpp = '-';

        return [
			'Uid'=>'target_org_'.$this->id,
			'ShortTitle'=>$this->name,
			'FullTitle'=>$this->descr,
			'Ogrn'=>$ogrn,
			'Kpp'=>$kpp,
			'Inn'=> '-',
		];
    }
}
<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FiscompetitiongroupsDirectionsResource extends JsonResource{
    function toArray($request){
        if(isset($this->Levels->toArray()[0]['id_fisservice'])) $idFisserviceLevel = $this->Levels->toArray()[0]['id_fisservice'];
        else $idFisserviceLevel = NULL;
        
        // if (!isset($this->HeadOrganization)) {
        //     return;
        // }
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'code'=>$this->code,
            'year'=>$this->year,
            'id_fis'=>$this->id_fis,
            'id_level'=>$this->id_level,
            'id_fisservice_level'=>$idFisserviceLevel,
            // 'o_b'=>$this->o_b,
            // 'o_l'=>$this->o_l,
            // 'o_s'=>$this->o_s,
            // 'o_t'=>$this->o_t,
            // 'o_d'=>$this->o_d,
            // 'z_b'=>$this->z_b,
            // 'z_l'=>$this->z_l,
            // 'z_s'=>$this->z_s,
            // 'z_t'=>$this->z_t,
            // 'z_d'=>$this->z_d,
            // 'oz_b'=>$this->oz_b,
            // 'oz_l'=>$this->oz_l,
            // 'oz_s'=>$this->oz_s,
            // 'oz_t'=>$this->oz_t,
            // 'oz_d'=>$this->oz_d,
            'length_o'=>$this->length_o,
            'date_start_o'=>$this->date_start_o,
            'date_finish_o'=>$this->date_finish_o,
            'length_z'=>$this->length_z,
            'date_start_z'=>$this->date_start_z,
            'date_finish_z'=>$this->date_finish_z,
            'length_oz'=>$this->length_oz,
            'date_start_oz'=>$this->date_start_oz,
            'date_finish_oz'=>$this->date_finish_oz,
            'is_mon'=>$this->is_mon,
            'is_foreign'=>$this->is_foreign,
            'is_military'=>$this->is_military,
            'is_deleted '=>$this->is_deleted,
            'Campaigns'=>FiscompetitiongroupsCampaignsResource::collection($this->Campaigns),
            'HeadOrganization' => $this->HeadOrganization,
		];
    }
}
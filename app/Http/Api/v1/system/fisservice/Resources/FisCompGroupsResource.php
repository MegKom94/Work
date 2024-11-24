<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisCompGroupsResource extends JsonResource
{

    function toArray($request)
    {
        $compGroupInfo = $this->Competitions->toArray();
        if (!isset($compGroupInfo[0]['direction'][0]['is_military']) || !isset($compGroupInfo[0]['direction'][0]['is_mon'])) {
        // var_dump($compGroupInfo[0]['direction'][0]['is_military']);
        // var_dump($compGroupInfo[0]['direction'][0]['is_mon']);

            
            return;
        }
        // var_dump($compGroupInfo[0]['direction'][0]['is_military']);
        if ($compGroupInfo ) { // && $this->id_status == 8
            return [
                // 'id' => $this->id,
                // было CompetitiveGroupID поменял на CompetitiveGroupUID потому  что так надо для Заявлений. Надеюсь это только там и используется.
                'CompetitiveGroupUID' => 'comp_group_' . $compGroupInfo[0]['id_direction'] . '_' . $compGroupInfo[0]['id_form'] . 
                '_' . $compGroupInfo[0]['id_type'] . "_" . $compGroupInfo[0]['is_foreign'] . 
                (isset($compGroupInfo[0]['is_en'])? '_' . $compGroupInfo[0]['is_en'] : "" ).
                (isset($compGroupInfo[0]['id_profile']) ? '_profile_' . $compGroupInfo[0]['id_profile'] : '') . 
                (isset($compGroupInfo[0]['id_detailed']) ? '_detailed_' . $compGroupInfo[0]['id_detailed'] : '') . 
                ($compGroupInfo[0]['id_admission_stage'] == 2 ? '_dop'  : ''),
                // 'com' => $compGroupInfo,
                'TargetOrganizationUID' => (isset($this->id_target_org)
                 && $this->id_target_org != 0
                  && isset($compGroupInfo[0]['id_detailed'])?
                   "target_org_" . $this->id_target_org  : null), // $this->id_target_org
                'TargetOrganizationContractUID' => (isset($this->id_target_org)
                 && $this->id_target_org != 0
                  && isset($compGroupInfo[0]['id_detailed'])?
                   "target_org_" . $this->id_target_org  : null), // $this->id_target_org

            ];
        } else {
            return;
        }
    }
} //2

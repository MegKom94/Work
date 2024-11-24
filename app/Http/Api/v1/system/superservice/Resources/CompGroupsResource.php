<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompGroupsResource extends JsonResource{
    
    function toArray($request){
        $compGroupInfo = $this->Competitions->toArray();
        // if(in_array($this->id_competition, [40, 92, 140, 184, 228, 707, 926, 927, 928, 929, 930, 979, 980])) return;

        if($compGroupInfo[0]['id_admission_stage'] == 1){
            $uidCompetition = 'comp_group_'.$compGroupInfo[0]['id_direction'].'_'.$compGroupInfo[0]['id_form'].'_'.$compGroupInfo[0]['id_type'].'_'.$compGroupInfo[0]['is_foreign'].'_'.$compGroupInfo[0]['is_en'].(isset($compGroupInfo[0]['id_profile']) ? '_profile_'.$compGroupInfo[0]['id_profile'] : '').(isset($compGroupInfo[0]['id_detailed']) ? '_detailed_'.$compGroupInfo[0]['id_detailed'] : '').((isset($compGroupInfo[0]['id_admission_stage']) AND  $compGroupInfo[0]['id_admission_stage'] == 2) ? '_dop' : '');
        }
        else{
            $uidCompetition = 'comp_group_'.$compGroupInfo[0]['id_direction'].'_'.$compGroupInfo[0]['id_form'].'_'.$compGroupInfo[0]['id_type'].'_'.$compGroupInfo[0]['is_foreign'].'_'.$compGroupInfo[0]['is_en'].(isset($compGroupInfo[0]['id_profile']) ? '_p_'.$compGroupInfo[0]['id_profile'] : '').(isset($compGroupInfo[0]['id_detailed']) ? '_detailed_'.$compGroupInfo[0]['id_detailed'] : '').((isset($compGroupInfo[0]['id_admission_stage']) AND  $compGroupInfo[0]['id_admission_stage'] == 2) ? '_dop' : '');
        }
        return [
            'id_CompGroups'=>$this->id,
            'UidCompetition'=>$uidCompetition,
            'Priority'=> ['Priority'.($this->id_target_org == 0 ? 'Other' : 'Target') => $this->priority],
            'IdStatus'=>(($this->id_target_org != 0 AND $this->id_status == 8) ? 4 : $this->id_status),
            'GuidCompetitiveGroup'=>$this->guid_comp_group,
        ];
    }
}
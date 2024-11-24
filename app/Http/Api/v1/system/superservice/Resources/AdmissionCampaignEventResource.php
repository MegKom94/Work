<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdmissionCampaignEventResource extends JsonResource{

    function toArray1($request){
        $admissionEvent = $this->whenLoaded('AbtAdmissionEvents')->toArray();
        if(isset($admissionEvent[0]) && isset($admissionEvent[0]['id'])) $admissionEvent = $admissionEvent[0]['id'];

        $levels = $this->whenLoaded('Levels')->toArray();
        if(isset($levels[0]) && isset($levels[0]['id_superservice'])) $levels = $levels[0]['id_superservice'];

        $educationForm = $this->whenLoaded('EducationForm')->toArray();
        if(isset($educationForm[0]) && isset($educationForm[0]['id_superservice'])) $educationForm = $educationForm[0]['id_superservice'];

        $competitionsTypes = $this->whenLoaded('CompetitionsTypes')->toArray();
        if(isset($competitionsTypes[0]) && isset($competitionsTypes[0]['id_superservice'])) $competitionsTypes = $competitionsTypes[0]['id_superservice'];

        $admissionStages = $this->whenLoaded('AdmissionStages')->toArray();
        if(isset($admissionStages[0]) && isset($admissionStages[0]['id_superservice'])) $admissionStages = $admissionStages[0]['id_superservice'];

        return [
            'UidCampaign'=>$this->uid_campaign,
            'Uid'=>$this->uid,
            'IdAdmissionEvent'=>$admissionEvent,
            'IdEducationLevel'=>$levels,
            'IdEducationForm'=>$educationForm,
            'IdPlaceType'=>$competitionsTypes,
            'IdStagesAdmission'=>$admissionStages,
            'StartEvent'=>$this->start_event,
            'EndEvent'=>$this->end_event,
		];
    }

    function toArray($request){
        return [
            'UidCampaign'=>$this->uid_campaign,
            'Uid'=>$this->uid,
            'IdAdmissionEvent'=>$this->id_event,
            'IdEducationLevel'=>$this->id_level,
            'IdEducationForm'=>$this->id_form,
            'IdPlaceType'=>$this->id_place_type,
            'IdStagesAdmission'=>$this->id_admission_stage,
            'StartEvent'=>$this->start_event,
            'EndEvent'=>$this->end_event,
		];
    }
}
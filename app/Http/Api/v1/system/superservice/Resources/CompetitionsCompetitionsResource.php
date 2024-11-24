<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\superservice\Resources\CompetitionsLevelsResource;
use App\Http\Api\v1\system\superservice\Resources\CompetitionsTargetOrgsDetailedResource;

class CompetitionsCompetitionsResource extends JsonResource{
    function toArray($request){
		$direction = $this->whenLoaded('Direction')->toArray();
		if($direction == []) return;
		$competitionsTypes = $this->whenLoaded('CompetitionsTypes')->toArray();
		
		
		$abtProfiles = $this->whenLoaded('AbtProfiles')->toArray();
		
		$profile = '';
		if(isset($abtProfiles[0]['title_1'])) $profile = $abtProfiles[0]['title_1'];
		if(isset($abtProfiles[0]['title_2'])) $profile .= '. '.$abtProfiles[0]['title_2'];
		if($profile != '') $profile = ' ('.$profile.')';


		$titleOrgGroups = '';
		$targetOrgGroups = $this->whenLoaded('TargetOrgsGroups')->toArray();
		if(isset($targetOrgGroups[0]))$titleOrgGroups = ' ('.$targetOrgGroups[0]['title'].')';



		$formName = '';
		switch($this->id_form) {
            case 1:
                $formName = " (очно).";
                break;
            case 2:
                $formName = " (заочно).";
                break;
            case 3:
                $formName = " (очно-заочно).";
                break;
        }

		if(isset($this->id_detailed)){
			return [
				'UidCampaign'=>$direction[0]['campaigns'][0]['superservice_uid'],
				'Uid'=>'comp_group_'.$this->id_direction.'_'.$this->id_form.'_'.$this->id_type.'_'.$this->is_foreign.'_'.$this->is_en.(isset($this->id_profile) ? '_p_'.$this->id_profile : '').(isset($this->id_detailed) ? '_detailed_'.$this->id_detailed : '').((isset($this->id_admission_stage) AND $this->id_admission_stage == 2) ? '_dop' : ''),
				'Name'=>$direction[0]['name'].($this->is_en === 1 ? ' (с использованием языка посредника)' : ''),
				'IdEducationLevel'=>json_decode(CompetitionsLevelsResource::collection($this->whenLoaded('Direction'))->toJson(), true)[0]['Level'][0]['id_superservice'],
				'IdEducationForm'=>$this->EducationForm->toArray()[0]['id_superservice'],
				'IdPlaceType'=>$competitionsTypes[0]['id_superservice'],
				'UidOrgDirection'=>'direction_'.$this->id_direction.($profile != '' ? '_profile_'.$this->id_profile : ''),
				'NumberPlaces'=>$this->places,
				'IdStageAdmission'=>$this->AdmissionStages->toArray()[0]['id_superservice'],
				'OnlyForForeigners'=>$this->is_foreign,
				'OnlyCitizensRF'=>($this->is_foreign === 0 ? 1 : 0),
				'Comment'=>$direction[0]['code'].' '.$direction[0]['name'].$profile.$titleOrgGroups.($this->is_en === 1 ? ' (с использованием языка посредника)' : '').$formName.' '.$competitionsTypes[0]['title'].($this->is_foreign === 0 ? ' (РФ)' : ' (иностранцы)'),
				'CompetitionParamList'=>
					CompetitionsTargetOrgsDetailedResource::collection($this->TargetOrgsDetailed),
				
			];
		}else{
			return [
				'UidCampaign'=>$direction[0]['campaigns'][0]['superservice_uid'],
				'Uid'=>'comp_group_'.$this->id_direction.'_'.$this->id_form.'_'.$this->id_type.'_'.$this->is_foreign.'_'.$this->is_en.(isset($this->id_profile) ? '_p_'.$this->id_profile : '').(isset($this->id_detailed) ? '_detailed_'.$this->id_detailed : '').((isset($this->id_admission_stage) AND $this->id_admission_stage == 2) ? '_dop' : ''),
				'Name'=>$direction[0]['name'].($this->is_en === 1 ? ' (с использованием языка посредника)' : ''),
				'IdEducationLevel'=>json_decode(CompetitionsLevelsResource::collection($this->whenLoaded('Direction'))->toJson(), true)[0]['Level'][0]['id_superservice'],
				'IdEducationForm'=>$this->EducationForm->toArray()[0]['id_superservice'],
				'IdPlaceType'=>$competitionsTypes[0]['id_superservice'],
				'UidOrgDirection'=>'direction_'.$this->id_direction.($profile != '' ? '_profile_'.$this->id_profile : ''),
				'NumberPlaces'=>$this->places,
				'IdStageAdmission'=>$this->AdmissionStages->toArray()[0]['id_superservice'],
				'OnlyForForeigners'=>$this->is_foreign,
				'OnlyCitizensRF'=>($this->is_foreign === 0 ? 1 : 0),
				'Comment'=>$direction[0]['code'].' '.$direction[0]['name'].$profile.$titleOrgGroups.($this->is_en === 1 ? ' (с использованием языка посредника)' : '').$formName.' '.$competitionsTypes[0]['title'].($this->is_foreign === 0 ? ' (РФ)' : ' (иностранцы)'),
				'CompetitionParamList'=>[]
			];
		}
    }
}
<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\fisservice\Resources\InstitutionprogramsDirectionsResource;

class InstitutionprogramsCompetitionsResource extends JsonResource{

    function toArray($request){

        $competitionsTypes = $this->CompetitionsTypes->toArray();
        if(isset($competitionsTypes[0]['title'])) $type = $competitionsTypes[0]['title'];
        else $type = NULL;

        $educationForm = $this->EducationForm->toArray();
        if(isset($educationForm[0]['name'])) $form = '('.$educationForm[0]['name'].')';
        else $form = NULL;

        $direction = InstitutionprogramsDirectionsResource::collection($this->whenLoaded('Direction'));

        // $direction = InstitutionprogramsDirectionsResource::collection($this->Direction);

        $abtProfiles = $this->whenLoaded('AbtProfiles')->toArray();
		
		$profile = null;
		if(isset($abtProfiles[0]['title_1'])) $profile = $abtProfiles[0]['title_1'];
		if(isset($abtProfiles[0]['title_2'])) $profile .= '. '.$abtProfiles[0]['title_2'];
        if ($profile != null) {
            if (mb_strlen($profile) > 65) {
                // var_dump(strlen($TargetOrgsGroups[0]['title']));
                $profile = '('. mb_substr($profile, 0, 65) . "...)";
            }else {
                $profile = '('.$profile.')';
            }
        }else {
            $profile = null;
        }
		// if($profile != null) $profile = '('.$profile.')';

        $TargetOrgsGroups = $this->whenLoaded('TargetOrgsGroups')->toArray();
        if (isset($TargetOrgsGroups[0])) {
            if (mb_strlen($TargetOrgsGroups[0]['title']) > 85) {
                // var_dump(strlen($TargetOrgsGroups[0]['title']));
                $TargetOrgsTitle = '('. mb_substr($TargetOrgsGroups[0]['title'], 0, 85) . "...)";
            }else {
                $TargetOrgsTitle = '('.$TargetOrgsGroups[0]['title'].')';
            }
        }else {
            $TargetOrgsTitle = null;
        }

        if($direction->toJson() == '[]') return;
        $directionJson = $this->whenLoaded('Direction')->toJson();
        $directionArray = json_decode($directionJson, false);
        // var_dump($directionArray[0]->head_organization);
        if (!isset($directionArray[0]->head_organization[0])) {
        // var_dump($directionArray);
            // var_dump($directionArray[0]->HeadOrganization);
            return;
        }
        return [
            'uid' => 'edu_prog_' . $this->id_direction . '_' . $this->id_form . 
                     '_' . $this->id_type . "_" . $this->is_foreign . 
                     (isset($this->is_en)? '_' . $this->is_en : '') . 
                     (isset($this->id_profile) ? '_profile_' . $this->id_profile : '') . 
                     (isset($this->id_detailed) ? '_detailed_' . $this->id_detailed : ''),
            'name' => $direction[0]['name'] . ($this->is_en == 1?  ' (с использованием языка посредника)' : '') .
                     (isset($profile)? (' ' . $profile) : '') . (isset($TargetOrgsTitle)? (' ' . $TargetOrgsTitle) : '') . 
                     ' ' . $form . '. ' . $type . ' ' . ($this->is_foreign == 1 ? '(иностранцы)' : '(РФ)'),
            'code' => $direction[0]['code'],
		];
    }
}
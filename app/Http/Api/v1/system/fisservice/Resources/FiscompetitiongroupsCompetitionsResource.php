<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\fisservice\Resources\FiscompetitiongroupsDirectionsResource;
use App\Http\Api\v1\system\fisservice\Resources\FiscompetitiongroupsTargetOrgsResource;
// use App\Http\sources\Mixin;
// echo "fff";

class FiscompetitiongroupsCompetitionsResource extends JsonResource{
// use Mixin;

    function toArray($request){
        // self::var_dump_f("zahodi esla che", "sos.txt");

        // echo "pipa";
        // return ["vesora sasat"];
        $competitionsTypes = $this->CompetitionsTypes->toArray();
        if(isset($competitionsTypes[0]['id_fisservice'])){
            $type = $competitionsTypes[0]['id_fisservice'];
            $type_name = $competitionsTypes[0]['title'];
        }
        else {
            $type = NULL;
            $type_name = NULL;
        }

        if(isset($competitionsTypes[0]['postfix'])) $postfix = $competitionsTypes[0]['postfix'];
        else $postfix = NULL;

        $educationForm = $this->EducationForm->toArray();
        if(isset($educationForm[0]['id_fisservice'])){
            $form_name = '('.$educationForm[0]['name'].')';
            $form = $educationForm[0]['id_fisservice'];
        }
        else{
            $form_name = NULL;
            $form = NULL;
        }

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

        // $changeMe = null;
        // $IndicatingCustomers = null;
        // if ($this->is_detailed_left == 1) {
        //     $IndicatingCustomers = ""; // 0
        //     $changeMe = 1;
        // }elseif ($this->id_detailed > 0) {
        //     $IndicatingCustomers = 1;
        //     $changeMe = "";
        // }elseif ($this->is_detailed_left == 0 && !isset($this->id_detailed)) {
        //     $IndicatingCustomers = "";
        //     $changeMe = 1;
        // }

        $direction = FiscompetitiongroupsDirectionsResource::collection($this->whenLoaded('Direction'));
        
        // unset($direction[0]["name"]);
      
        $cgExams = FiscompetitiongroupsCgExamsResource::collection($this->whenLoaded('CgExams'))->toJson();
        
        $cgExamsArray = json_decode($cgExams, true);
        // var_dump($cgExamsArray);
        $cgExamsFiltered = [];
        foreach ($cgExamsArray as $key => $value) {
            if ($this->is_en == $value["is_en"] && $this->id_profile == $value["id_profile"]) {
                // var_dump($cgExamsFiltered);
                array_push($cgExamsFiltered, $cgExamsArray[$key]);
                // array_push($cgExamsFiltered, $cgExamsArray[$key]);
                
            }
        }
        if ($this->is_foreign == 1 && $this->is_en == 0) {
            $cgExamsFilteredForForeigners = [];
            foreach ($cgExamsFiltered as $key => $value) {
                // $value["priority"] != 3 &&  это я убрал, чтобы загружался еще и русский, потому что с 2024 года они его сдают оказывается
                if ($value["is_spo"] == 0 && $value["is_en"] == 0) { 
                    array_push($cgExamsFilteredForForeigners, $cgExamsFiltered[$key]);
                }
            }
            $cgExamsFiltered = $cgExamsFilteredForForeigners;
        }

        // может получиться перед коллекцией засунуть в объект места, но зачем... срань, думай думай..
        $TargetOrgsUIDs = FiscompetitiongroupsTargetOrgsResource::collection($this->whenLoaded('TargetOrgsDetailed'));
        // if ($TargetOrgsUIDs == []) {
        //     // echo "<pre>";
        //     // var_dump($TargetOrgsUIDs);
        //     // echo "</pre>";

        //     $TargetOrgsUIDs = null;
        // }

        $TargetOrgsGroups = $this->whenLoaded('TargetOrgsGroups')->toArray(); // переделать на TargetOrgs модель.
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




        // if ($TargetOrgsUIDs->toJson() != '[]') {
        //     if ($IndicatingCustomers == 1) {
        //         // $TargetOrgsUIDsJson = $TargetOrgsUIDs->toJson();
        //         // $TargetOrgsUIDsJson[$this->id_form . $this->id_type] = $this->places;
        //         // $TargetOrgsUIDs = json_decode($TargetOrgsUIDsJson, false); 
                
        //     }
        // }

        if($direction->toJson() == '[]') return;
        $directionJson = $direction->toJson();
        $directionArray = json_decode($directionJson, false);
        
        if (!isset($directionArray[0]->HeadOrganization[0])) {
        // var_dump($directionArray);
            // var_dump($directionArray[0]->HeadOrganization);
            return;
        }
        if ($this->id_admission_stage == 2) {
            $IsAdditional = 1;
        }

        $type_with_dop = ($this->id_type > 5?"5":$this->id_type);
        
        return [
            'id'=> "comp_group_" . $this->id_direction . '_' . $this->id_form . 
                    '_' . $type_with_dop . "_" . $this->is_foreign . 
                    (isset($this->is_en)? '_' . $this->is_en : '') . 
                    (isset($this->id_profile) ? '_profile_' . $this->id_profile : '') . 
                    (isset($this->id_detailed) ? '_detailed_' . $this->id_detailed : '').
                    (isset($IsAdditional) ? '_dop'  : '')
                    ,

            "id_direction"=> $this->id_direction,
            "id_type"=> $type_with_dop,
            "id_type_fis"=>$type,
            // "name_type"=>$type_name,
            'id_edu' => 'edu_prog_' . $this->id_direction . '_' . $this->id_form . 
                        '_' . $type_with_dop . "_" . $this->is_foreign . 
                        (isset($this->is_en)? '_' . $this->is_en : '') . 
                        (isset($this->id_profile) ? '_profile_' . $this->id_profile : '') . 
                        (isset($this->id_detailed) ? '_detailed_' . $this->id_detailed : ''),
            
            'name' => $direction[0]['name'] . ($this->is_en == 1? ' (с использованием языка посредника)' : '') .
                        (isset($profile)? (' ' . $profile) : '') . (isset($TargetOrgsTitle)? (' ' . $TargetOrgsTitle) : '') . 
                        ' ' . $form_name . '. ' . $type_name . ' ' . ($this->is_foreign == 1 ? '(иностранцы)' : '(РФ)'),
            // "len" => mb_strlen((isset($profile)? (' ' . $profile) : '')),
            // "form_name" => isset($profile)? 1:0,

            "id_form"=>$this->id_form,
            "id_form_fis"=>$form,
            // "IndicatingCustomers" =>$IndicatingCustomers,
            // "changeMe" => $changeMe,
            // "name_form"=>$form_name,
            
            "IsAdditional" => (isset($IsAdditional)?1:""),
            "postfix"=>$postfix,
            'places'=>$this->places,
            'id_target_org'=>$this->id_detailed,
            'is_foreign'=>$this->is_foreign,
            // 'foreign_title' => ($this->is_foreign ? "(иностранцы)" : "(РФ)"),
            'is_deleted '=>$this->is_deleted,
            
            'Direction'=>$direction,
            'CgExams'=>$cgExamsFiltered,
            'TargetOrganization' => ($TargetOrgsUIDs->toJson() != '[]' ? $TargetOrgsUIDs : null),
        ];
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\superservice\Resources\CompGroupsResource;

class AppApp1Resource extends JsonResource{
    
    function toArray($request){
        $superServiceLogs = $this->SuperServiceLogs->toArray();
        
        foreach($superServiceLogs as $key=>$superServiceLog){
            if(!isset($superServiceLog['entity']) || $superServiceLog['entity'] != 'ApplicationList_Add_'.$this->rate) {
                unset($superServiceLogs[$key]);
            }
            else{
                unset($superServiceLogs[$key]['id_user']);
                unset($superServiceLogs[$key]['entity']);
                unset($superServiceLogs[$key]['answer']);
                unset($superServiceLogs[$key]['status']);
                unset($superServiceLogs[$key]['date']);
            }
        }

        return [
            'id'=>$this->id,
            'id_user'=>$this->id_user,
            'lastname'=>$this->lastname,
            'firstname'=>$this->firstname,
            'secondname'=>$this->secondname,
            'DocsIdentity'=>$this->id_protected,
            'date_create'=> date("Y-m-d\TH:i:s+03:00", $this->date_accept_first ),
            'rate'=> ($this->rate == 1 ? 'true' : 'false'),
            'gender'=>($this->sex == '1' ? 1 : 2),
            'birthdate'=> date("Y-m-d", $this->date_birth),
            'birthplace'=>$this->place_birth,
            'need_hostel'=>($this->is_need_hostel == 1 ? "true" : "false"),
            'phone_mob'=>$this->tel,
            'contact_email'=>$this->email,
            'oksm'=>$this->epgu_oksm,
            'is_first_edu'=>$this->is_first_edu,
            'is_test'=>$this->is_test,
            'IdStageAdmission'=>($this->id_admission_stage == 2 ? 4 : $this->id_admission_stage),
            'guid_entrant'=>$this->guid_entrant,
            'guid_app'=>$this->guid_app,
            'AddCompetitiveGroupList'=>CompGroupsResource::collection($this->CompGroups),
            'SuperServiceLogs'=>$superServiceLogs,
            'docs'=>[
                'snils'=>'',
                'identification_doc'=>[
                    'epgu_type'=>$this->id_superservice,
                    'doc_name'=>$this->name,
                ]
            ],
        ];
    }
}

class DocsIdentityResource extends JsonResource{
    
    function toArray($request){
        return $this->id;
    }
}
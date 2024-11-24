<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\superservice\Resources\CompGroupsResource;

class AppAppResource extends JsonResource{
    
    function toArray($request){
        $arrays = [
            'user'=>'user',
            'userAdd'=>'user_add',
            'addresses'=>'addresses',
            'superServiceLogs'=>'super_service_logs'
        ];

        if(isset($this->UserExecution->toArray()[0])){
            $userExecution = $this->whenLoaded('UserExecution')->toArray()[0];
        }
        else{
            $userExecution = [];
        }

        
        foreach($arrays as $key=>$array){
            if(isset($userExecution[$array])){
                if($key == 'superServiceLogs'){
                    if(isset($userExecution[$array])) $$key = $userExecution[$array];
                    else return;
                }
                else {
                    if(isset($userExecution[$array][0])) $$key = $userExecution[$array][0];
                    else return;
                }
            }
            else{
                $$key = [];
            }
        }


        
        foreach($superServiceLogs as $key=>$superServiceLog){
            if(!isset($superServiceLog['entity']) || $superServiceLog['entity'] != 'ApplicationList_Add_'.$this->is_budget) {
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
        
        if(!isset($userAdd['countries']['0'])){
            return;
        }

        $docsIdentityArray = $this->whenLoaded('DocsIdentity')->toArray();
        
        if(isset($docsIdentityArray[0])) $docsIdentityArray = $docsIdentityArray[0]; 
        else {
            return;
        }
        
        $compGroups = json_decode(CompGroupsResource::collection($this->CompGroups)->toJson(), true);
        // if($compGroups === []) return;
        // if($superServiceLogs == []) return;
        // if($this->is_budget == 1) return; 
        return [
            'id'=>$this->id,
            'id_user'=>$user['id'],
            'lastname'=>$user['lastname'],//($user['lastname'] != '-' ? $user['lastname']: ' '),
            'firstname'=>$user['firstname'], //($user['firstname'] != '-' ? $user['firstname']: ' '),
            'secondname'=>$user['secondname'],//($user['secondname'] != '-' ? $user['secondname']: ' '),
            'DocsIdentity'=>$docsIdentityArray['id_protected'],
            'date_create'=> date("Y-m-d\TH:i:s+03:00", $this->date_create),
            'rate'=> ($this->is_budget == 1 ? 'true' : 'false'),
            'gender'=>($user['sex'] == '1' ? 1 : 2),
            'birthdate'=> date("Y-m-d", $userAdd['date_birth']),
            'birthplace'=>$userAdd['place_birth'],
            'need_hostel'=>($this->is_need_hostel == 1 ? "true" : "false"),
            'phone_mob'=>$user['tel'],
            'contact_email'=>$user['email'],
            'oksm'=>$userAdd['countries']['0']['epgu_oksm'],
            'is_first_edu'=>$this->is_first_edu,
            'is_test'=>$this->is_test,
            'IdStageAdmission'=>($this->id_admission_stage == 2 ? 4 : $this->id_admission_stage),
            'guid_entrant'=>$user['guid_entrant'],
            'guid_app'=>$this->guid_app,
            'AddCompetitiveGroupList'=>[
                'AddCompetitiveGroup'=>$compGroups,
            ],
            'SuperServiceLogs'=>$superServiceLogs,
            'docs'=>[
                'snils'=>'',
                'identification_doc'=>[
                    'epgu_type'=>$docsIdentityArray['docs_types'][0]['id_superservice'],
                    'doc_name'=>$docsIdentityArray['docs_types'][0]['name'],
                ]
            ],
            'DocsStudy'=>AppDocsStudyResource::collection($this->DocsStudy),
            // 'test'=>$this->DocsStudy,
        ];
    }
}
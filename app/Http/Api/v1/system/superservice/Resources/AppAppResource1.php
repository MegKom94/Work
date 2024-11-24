<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\superservice\Resources\CompGroupsResource;

class AppApp1Resource extends JsonResource{
    
    function toArray($request){

        return [
            'id'=>$this->id,
            'id_user'=>$user['id'],
            'lastname'=>$user['lastname'],
            'firstname'=>$user['firstname'],
            'secondname'=>$user['secondname'],
            'DocsIdentity'=>$docsIdentityArray['id_protected'],
            'date_create'=> date("Y-m-d\TH:i:s+03:00", $this->date_accept_first ),
            'rate'=> ($userExecution['rate'] == 1 ? 'true' : 'false'),
            'gender'=>($user['sex'] == '1' ? 1 : 2),
            'birthdate'=> date("Y-m-d", $userAdd['date_birth']),
            'birthplace'=>$userAdd['place_birth'],
            'need_hostel'=>($this->is_need_hostel == 1 ? "true" : "false"),
            'phone_mob'=>$user['tel'],
            'contact_email'=>$user['email'],
            'oksm'=>$addresses['countries']['0']['epgu_oksm'],
            'is_first_edu'=>$this->is_first_edu,
            'is_test'=>$this->is_test,
            'IdStageAdmission'=>($this->id_admission_stage == 2 ? 4 : $this->id_admission_stage),
            'guid_entrant'=>$user['guid_entrant'],
            'guid_app'=>$this->guid_app,
            'AddCompetitiveGroupList'=>CompGroupsResource::collection($this->CompGroups),
            'SuperServiceLogs'=>$superServiceLogs,
            'docs'=>[
                'snils'=>'',
                'identification_doc'=>[
                    'epgu_type'=>$docsIdentityArray['docs_types'][0]['id_superservice'],
                    'doc_name'=>$docsIdentityArray['docs_types'][0]['name'],
                ]
            ],
        ];
    }
}
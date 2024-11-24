<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisAppWithOrdersResource extends JsonResource
{

    function toArray($request)
    {
        // $arrays = [
        //     'user' => 'user',
        //     // 'userAdd' => 'user_add',
        //     // 'addresses' => 'addresses',
        //     // 'docs' => 'docs',
        // ];

        // if ($this->UserExecution != null) {
        //     $userExecution = $this->UserExecution->toArray()[0];
        // } else {
        //     $userExecution = [];
        //     return;
        // }
        // foreach ($arrays as $key => $array) {
        //     if (isset($userExecution[$array])) {
        //         if (isset($userExecution[$array][0])) $$key = $userExecution[$array][0];
        //         else return;
        //     } else {
        //         $$key = [];
        //     }
        // }
        // $docsIdentityArray = $this->DocsIdentity->toArray()[0];
        // $CompGroups = $this->CompGroups->toArray()[0];

            // var_dump($this->OrderTypes);
            // 'uid_app' => "app_" . $Direction['year'] . "_" . $userExecution['id_user'] . "_" . $this->id_execution,

        if ($this->id_status == 14) {
            $ordertypeid = 2;
        }else{
            $ordertypeid = 1;
        }

        
        return [
            // 'lastname' => $user['lastname'],
            // 'firstname' => $user['firstname'],
            // 'secondname' => $user['secondname'],
            // 'id' => $this->id,
            // 'name' => $this->name,
            // 'number' => $this->number,
            // 'form' => $this->OrderTypes[0]->id_fisservice,
            // 'source' => $this->OrderSources[0]->id_fisservice,
            // 'level' => $this->Levels[0]->id_fisservice,
            // 'regdate' => $this->regdate,
            // 'date_begin' => $this->date_begin,


            // 'Campaigns' => $this->Campaigns,
            'id' => $this->id,
            'ApplicationUID' => "app_" . $this->Competitions[0]->direction[0]->year . "_" . $this->App[0]->UserExecution[0]->id_user . "_" . $this->App[0]->id_execution . "_" . $this->id_app,
            'OrderUID' => "order_" . explode("-",$this->order_date)[0] . "_" . $this->order_id  . "_" . $this->Competitions[0]->direction[0]->levels[0]->id_fisservice,
            'OrderTypeID' => $ordertypeid,
            'CompetitiveGroupUID' => 'comp_group_' . $this->Competitions[0]->id_direction . '_' . $this->Competitions[0]->id_form . 
                '_' . $this->Competitions[0]->id_type . "_" . $this->Competitions[0]->is_foreign . 
                (isset($this->Competitions[0]->is_en)? '_' . $this->Competitions[0]->is_en : "" ).
                (isset($this->Competitions[0]->id_profile) ? '_profile_' . $this->Competitions[0]->id_profile : '') . 
                (isset($this->Competitions[0]->id_detailed) ? '_detailed_' . $this->Competitions[0]->id_detailed : '') .
                (isset($this->Competitions[0]->id_admission_stage) && $this->Competitions[0]->id_admission_stage  == 2 ? '_dop'  : ''),
            // 'Stage' => $stage,
            // 'App' => $this->App,
            // 'Competitions' => $this->Competitions,




            // 'doc_protected' => (isset($docsIdentityArray['id_protected']) ? $docsIdentityArray['id_protected'] : ""),
        ];
    }
}

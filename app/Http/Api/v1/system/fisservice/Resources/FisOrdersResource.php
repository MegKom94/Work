<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisOrdersResource extends JsonResource
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
            if (in_array($this->OrderTypes[0]->id_fisservice, [11, 12]) && $this->OrderSources[0]->id_fisservice == 14 && in_array($this->Levels[0]->id_fisservice, [2, 5])) {
                $stage = 1;
                # code...
            }else {
                // var_dump($this->id_form, [1, 3]);
                $stage = 0;
            }

        return [
            // 'lastname' => $user['lastname'],
            // 'firstname' => $user['firstname'],
            // 'secondname' => $user['secondname'],
            'id' =>  $this->id,
            'uid' => "order_" . explode("-",$this->regdate)[0] . "_" . $this->id,
            'name' => $this->name,
            'number' => $this->number, //  . "_" .  $this->OrderSources[0]->socr
            'form' => $this->OrderTypes[0]->id_fisservice,
            'source' => $this->OrderSources[0]->id_fisservice,
            // 'sorce_2' => $this->source,
            'level' => $this->Levels[0]->id_fisservice,
            'regdate' => $this->regdate,
            'date_begin' => $this->regdate, // date("Y-m-d", $this->date_begin),
            'stage' => $stage,


            'Campaigns' => $this->Campaigns,
            // 'CompGroups' => $this->CompGroups,
            'IsSpecialQuota' => ($this->source == 4? 1 : "")


            // 'doc_protected' => (isset($docsIdentityArray['id_protected']) ? $docsIdentityArray['id_protected'] : ""),
        ];
    }
}

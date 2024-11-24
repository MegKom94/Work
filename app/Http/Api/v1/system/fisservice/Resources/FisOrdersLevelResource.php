<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisOrdersLevelResource extends JsonResource
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
        $order_levels['id_order'] = $this->id;
        $order_levels['levels'] = []; 
        $CompGroups = $this->CompGroups->toArray();
        foreach ($CompGroups as $key => $value) {
            foreach ($value['competitions'] as $key1 => $value1) {
                foreach ($value1['direction'] as $key2 => $value2) {
                    // var_dump($value2['levels'][0]['id_fisservice']);
                    // if ($this->Levels[0]->id != $value2['id_level']) {
                    if (!in_array($value2['levels'][0]['id_fisservice'], $order_levels['levels']) ) {
                        array_push($order_levels['levels'], $value2['levels'][0]['id_fisservice']);
                        // $order_levels[] = $value2['id_level'];

                    }
                    // }
                    # code...
                }
                # code...
            }
            # code...
        }
        // array_push($order_levels, ['id_order' => $this->id]);
        // var_dump($order_levels);
        return $order_levels;

            // var_dump($this->OrderTypes);
            // 'uid_app' => "app_" . $Direction['year'] . "_" . $userExecution['id_user'] . "_" . $this->id_execution,
            if (in_array($this->OrderTypes[0]->id_fisservice, [14, 12]) && $this->OrderSources[0]->id_fisservice == 1 && in_array($this->Levels[0]->id_fisservice, [2, 5])) {
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
            'number' => $this->number . "_" .  $this->OrderSources[0]->socr,
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

<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisEgeByDepartmentResource extends JsonResource
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

        // if ($this->id_profile == 72) {
        //     var_dump($this->id_dep)
        // }

        if (isset($this->id_dep)) {
            if (in_array($this->id_direction, [3480,3481]) && $this->id_dep !=$this->id_department ) {
                return;
            }
            // if ($this->id_department != $this->id_dep) {
            //    return;
            // }
            $department = $this->id_dep;
        } else {
            $department = $this->id_department;
        }


        if (isset($this->id_department)) {
            // echo "gavno\n";
        
        return [
            // 'lastname' => $user['lastname'],
            // 'firstname' => $user['firstname'],
            // 'secondname' => $user['secondname'],
            // 'id' => $this->id,
            'firstname' => $this->firstname,
            'secondname' => $this->secondname,
            'lastname' => $this->lastname,


            'id_execution' => $this->id_execution,
            'doc_protected' => $this->id_protected,
            'id_user' => $this->id_user,
            'id_profile' => $this->id_profile,
            'id_app' => $this->id_app,

            "id_profileee" => $this->id_profileee,

            'id_department' => $department,
            // 'id_department_Direction' => $this->id_department,
            // 'id_department_AbtProfiles' => $this->id_dep,

            // 'status' => $this->status,
            // 'date_create' => $this->date_create,

            // 'doc_protected' => (isset($docsIdentityArray['id_protected']) ? $docsIdentityArray['id_protected'] : ""),
        ];
            # code...
        }else {
            return;
        }
    }
}

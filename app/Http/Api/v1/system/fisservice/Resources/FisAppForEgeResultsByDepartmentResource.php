<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisAppForEgeResultsByDepartmentResource extends JsonResource
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



        return [
            // 'lastname' => $user['lastname'],
            // 'firstname' => $user['firstname'],
            // 'secondname' => $user['secondname'],
            'id' => $this->id,
            'id_execution' => $this->id_execution,
            'id_doc_protected' => $this->id_doc_protected,
            'status' => $this->status,
            'date_create' => $this->date_create,

            // 'doc_protected' => (isset($docsIdentityArray['id_protected']) ? $docsIdentityArray['id_protected'] : ""),
        ];
    }
}

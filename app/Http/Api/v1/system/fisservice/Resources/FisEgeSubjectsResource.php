<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisEgeSubjectsResource extends JsonResource
{

    function toArray($request)
    {
        // $arrays = [
        //     'user' => 'user',
        //     // 'userAdd' => 'user_add',
        //     // 'addresses' => 'addresses',
        //     // 'docs' => 'docs',
        // ];

        // if (isset($this->UserExecution->toArray()[0])) {
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

            if ($this->Marks->toArray() == []) {
               return;
            }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'fis_id' => $this->fis_id,
            'is_ege' => $this->is_ege,
            'is_deleted' => $this->is_deleted,
            'Marks' => $this->Marks,


        ];
    }
}

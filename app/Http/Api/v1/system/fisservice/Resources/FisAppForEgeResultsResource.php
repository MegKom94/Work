<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\fisservice\Resources\FisPrevDocsEgeResource;
use Exception;
use PhpParser\Node\Expr\Throw_;
use PHPUnit\Event\Code\Throwable;

class FisAppForEgeResultsResource extends JsonResource
{

    function toArray($request)
    {
        $arrays = [
            'user' => 'user',
            'userAdd' => 'user_add',
            // 'addresses' => 'addresses',
            'Docs' => 'docs',
        ];

        if (isset($this->UserExecution->toArray()[0])) {
            $userExecution = $this->UserExecution->toArray()[0];
        } else {
            $userExecution = [];
            return;
        }
        foreach ($arrays as $key => $array) {
            if (isset($userExecution[$array])) {
                if (isset($userExecution[$array][0])) $$key = $userExecution[$array][0];
                else return;
            } else {
                $$key = [];
            }
        }
        try{
            $docsIdentityArray = $this->DocsIdentity->toArray()[0];

        }catch (Exception $e){
            return;
        }
        // $docsObject = json_decode(json_encode($this->UserExecution[0]->docs), FALSE);
        // $docsPrevious = $this->Docs
        // $CompGroups = $this->CompGroups->toArray()[0];

        // if ($this->AbtFisEgeStatus->toArray()) {
        //     # code...
        // }else {
        //     return;
        // }
        $CompGroups = $this->CompGroups->toArray();
        foreach ($CompGroups as $key1 => $CompGroup) {
            foreach ($CompGroup['competitions'] as $key2 => $Competition) {
                // var_dump($Competition);
                if ($Competition['is_foreign'] == 1) {
                    return;
                }
                # code...
            }
            # code...
        }

        if ($userAdd['id_country'] != 1) {
            return;
        }



        return [
            'lastname' => $user['lastname'],
            'firstname' => $user['firstname'],
            'secondname' => $user['secondname'],
            'id_execution' => $userExecution['id'],
            // 'id_execution2' => $userExecution,

            'AbtFisEgeStatus' => $this->AbtFisEgeStatus,
            // 'prev_docs' => FisPrevDocsEgeResource::collection($this->UserExecution[0]->docs),
            // 'doc_protected' => (isset($docsIdentityArray['id_protected']) ? $docsIdentityArray['id_protected'] : ""),
            'id_user' => (isset($docsIdentityArray['id_user']) ? $docsIdentityArray['id_user'] : ""),
            // 'comp_groups' => $this->CompGroups, 
        ];
    }
}

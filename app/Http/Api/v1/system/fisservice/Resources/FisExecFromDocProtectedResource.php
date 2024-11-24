<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FisExecFromDocProtectedResource extends JsonResource
{

    // function toArray($request)
    // {
    //     // $arrays = [
    //     //     'user' => 'user',
    //     //     // 'userAdd' => 'user_add',
    //     //     // 'addresses' => 'addresses',
    //     //     // 'docs' => 'docs',
    //     // ];
    //     // var_dump($this->UserExecution);
    //     // var_dump($this->id_protected);
        // if (isset($this->UserExecution->toArray()[0])) {
        //     $userExecution = $this->UserExecution->toArray()[0];
        // } else {
        //     $userExecution = [];
        //     return;
        // }
    //     // foreach ($arrays as $key => $array) {
    //     //     if (isset($userExecution[$array])) {
    //     //         if (isset($userExecution[$array][0])) $$key = $userExecution[$array][0];
    //     //         else return;
    //     //     } else {
    //     //         $$key = [];
    //     //     }
    //     // }
    //     // $docsIdentityArray = $this->DocsIdentity->toArray()[0];


    //     return [
    //         'id_execution' => $userExecution['id'],
    //         'doc_protected' => $this->id_protected,
    //         'app' => $userExecution["app"],
    //         // 'comp_groups' => $userExecution[]
    //     ];
    // }

    function toArray($request)   {

        if ($this->is_deleted == 1) {
            return;
        }
        // if ($this->App->toArray() != []) {
        //     $App = $this->App->toArray();
        //     $userExecution = [];
        //     $CompGroups = [];
        //     foreach ($App as $keyA => $ap) {
        //         array_push($userExecution, $ap['id_execution']);
        //         foreach ($ap['comp_groups'] as $keya => $comp_group) {
        //             array_push($CompGroups, $comp_group['id']);
        //         }
        //     } 
        // }
        if ($this->UserExecution->toArray() !=[] ) {
            $userExecution_pre = $this->UserExecution->toArray();
            // var_dump($this->UserExecution);
            $userExecution = [];
            $CompGroups = [];
            foreach ($userExecution_pre as $keyUE => $ue) {
                // var_dump($ue['app']);
                if (isset($ue['app'][0])) { //  && $ue['app'] !=[]
                    array_push($userExecution, $ue['id']);
                    foreach ($ue['app'] as $keyApp => $valueApp) {
                        foreach ($valueApp["comp_groups"] as $keyCompGroup => $CG) {
                            array_push($CompGroups, $CG['id']);
                        }
                    }
                }
                
            }
        } 
        else {
            if ($this->App->toArray() != []) {
                $App = $this->App->toArray();
                $userExecution = [];
                $CompGroups = [];
                foreach ($App as $keyA => $ap) {
                    array_push($userExecution, $ap['id_execution']);
                    foreach ($ap['comp_groups'] as $keya => $comp_group) {
                        array_push($CompGroups, $comp_group['id']);
                    }
                } 
            }
            // if ($this->UserExecution->toArray() !=[] ) {
            //     $userExecution_pre = $this->UserExecution->toArray();
            //     // var_dump($this->UserExecution);
            //     $userExecution = [];
            //     $CompGroups = [];
            //     foreach ($userExecution_pre as $keyUE => $ue) {
            //         array_push($userExecution, $ue['id']);
            //         foreach ($ue['app'] as $keyApp => $valueApp) {
            //             foreach ($valueApp["comp_groups"] as $keyCompGroup => $CG) {
            //                 array_push($CompGroups, $CG['id']);
            //             }
            //         }
            //     }
            // } 
        }



        if (!isset($CompGroups)) {
           return;
        }
        if (!isset($this->id_protected)) {
            return;
        }
        if (!isset($userExecution)) {
            return;
        }
        return [
            'executions' => (isset($userExecution)? $userExecution : ""),
            'doc_protected' => $this->id_protected,
            'id_user' => $this->id_user,
            'comp_groups' => (isset($CompGroups)? $CompGroups : ""),
        ];
        
    }
}

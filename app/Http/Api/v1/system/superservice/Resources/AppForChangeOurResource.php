<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\superservice\Resources\CompGroupsResource;
use App\Http\Api\v1\system\superservice\Resources\AppForChangeOurSuperServiceLogsResource;

class AppForChangeOurResource extends JsonResource{

    function toArray($request){
        $userExecutions = $this->whenLoaded('UserExecution');
        $compGroups = [];

        foreach($userExecutions as $key=>$userExecution){
            foreach($userExecution->App as $app){
                foreach(CompGroupsResource::collection($app->CompGroups) as $compGroup){
                    $compGroupArray = json_decode($compGroup->toJson(), true);

                    array_push($compGroups, ['guid_app'=>$app->guid_app] + $compGroupArray);
                }
            }
        }


        $logs = AppForChangeOurSuperServiceLogsResource::collection($this->whenLoaded('SuperServiceLogs'));

        return [
            'id_user'=>$this->id,
            'guid_entrant'=>$this->guid_entrant,
            'CompetitiveGroupPriorityList'=>[
                'CompetitiveGroupPriority'=>$compGroups,
            ],
            'SuperServiceLogs'=>$logs,
        ];
    }
}
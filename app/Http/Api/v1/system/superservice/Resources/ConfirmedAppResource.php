<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\superservice\Resources\ConfirmedAppCompGroupsResource;
use App\Http\sources\Mixin;

class ConfirmedAppResource extends JsonResource{
    use Mixin;

    function toArray($request){
        $compGroups = ConfirmedAppCompGroupsResource::collection($this->whenLoaded('CompGroups'));
        $compGroups = json_decode($compGroups->toJson(), true);

        
        $flag = true;
        foreach($compGroups as $compGroup){
            if(isset($compGroup) AND $compGroup['id_target_org'] !== null){
                return;
            }
            
            if(isset($compGroup)){
                $flag = false;
            }
        }
        // if($this->id == 8456){
        //     var_dump($compGroups);
        // }
        // 
        if($this->whenLoaded('DocsStudy')->toArray() == [] OR $this->whenLoaded('DocsIdentity')->toArray() == [] OR $compGroups == [] OR $flag) return;


        return [
            'id_App'=>$this->id,
            'id_UserExecution'=>$this->id_execution,
            'DocsStudy'=>$this->whenLoaded('DocsStudy'),
            'CompGroups'=>$compGroups,
        ];
    }
}
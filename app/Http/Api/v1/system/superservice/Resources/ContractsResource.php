<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContractsResource extends JsonResource{

    function toArray($request){

        $superServiceLogs = $this->whenLoaded('SuperServiceLogs')->toArray();
        $logs = [];

        foreach($superServiceLogs as $key=>$superServiceLog){
            if(!isset($superServiceLog['entity']) || $superServiceLog['entity'] != 'PaidContract_Add_'.$this->id) {
                unset($superServiceLogs[$key]);
            }
            else{
                unset($superServiceLogs[$key]['id_user']);
                unset($superServiceLogs[$key]['entity']);
                unset($superServiceLogs[$key]['answer']);
                unset($superServiceLogs[$key]['status']);
                unset($superServiceLogs[$key]['date']);

                array_push($logs, $superServiceLog);
            }
            
        }
        return [
            'id_AsuContracts'=>$this->id,
            'id_user'=>$this->eios_id,
            'guid_comp_group'=>$this->guid_comp_group,
            'contract_number'=>$this->contract_number,
            'contract_speciality'=>$this->contract_speciality,
            'contract_duration'=>$this->contract_duration,
            'contract_cost'=>$this->contract_cost,
            'contract_cost_year'=>$this->contract_cost_year,
            'contract_payer'=>$this->contract_payer,
            'contract_payment_code'=>$this->contract_payment_code,
            'SuperServiceLogs'=>$logs,
		];
    }
}
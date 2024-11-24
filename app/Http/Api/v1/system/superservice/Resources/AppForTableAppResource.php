<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppForTableAppResource extends JsonResource{
    
    function toArray($request){
        $logs = json_decode('['.$this->status_logs.']', true);
        $logsTrue = [];
        foreach($logs as $log){
            if($log['entity'] == 'EpguApplication' OR $log['entity'] == 'ApplicationList_Add_'.$this->is_budget){
                array_push($logsTrue, $log);
            }
        }
        $logsTrue = end($logsTrue);

        if(isset($logsTrue['status'])) $status = $logsTrue['status'];
        else $status = 'Статуса нет';


        return [
            'id_App'=>$this->id,
            'id_user'=>$this->id_user,
            'id_execution'=>$this->id_execution,
            'fio'=>$this->lastname.' '.$this->firstname.' '.$this->secondname,
            'rate'=>($this->is_budget == 1 ? 'Бюджет': 'Договор'),
            'is_first_edu'=>($this->is_first_edu == 1 ? 'Да': 'Нет'),
            'IdStageAdmission'=>($this->id_admission_stage == 1 ? 'Основной': 'Дополнительный'),
            'date_create'=>date("Y-m-d", $this->date_create),
            'guid_entrant'=>$this->guid_entrant,
            'guid_app'=>$this->guid_app,
            'status_logs'=>$status,
        ];
    }
}
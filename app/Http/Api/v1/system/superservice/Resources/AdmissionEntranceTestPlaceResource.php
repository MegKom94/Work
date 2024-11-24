<?php
namespace App\Http\Api\v1\system\superservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdmissionEntranceTestPlaceResource extends JsonResource{
    function toArray($request){
        $isJuly = date('m', strtotime($this->edate)) == ' 07';

        $payment = '';
        if($isJuly) $payment = ' (бюджет и договор)';
        else $payment = ' (договор)';

        return [
            'UidCampaign'=>'2024_bak_spec',
            'Uid'=>'schedule_'.$this->Uid,

            // Для боевого контура
            // 'StartTest'=>$this->edate."T".$this->etime."+03:00",
            // 'StartRegistration'=> $this->year.'-06-20T09:00:00+03:00',
            // 'EndRegistration'=>($isJuly ? $this->year.'-07-20T17:00:00+03:00' : $this->year.'-08-19T17:00:00+03:00'),

            // Для тестового контура
            // 'StartTest'=>date("Y-m-d", strtotime($this->edate.' -2 months'))."T".$this->etime."+03:00",
            // 'StartRegistration'=> $this->year.'-05-10T09:00:00+03:00',
            // 'EndRegistration'=>($isJuly ? $this->year.'-05-20T17:00:00+03:00' : $this->year.'-05-20T17:00:00+03:00'),

            // Для доп набора договор боевого контура
            'StartTest'=>$this->edate."T".$this->etime."+03:00",
            'StartRegistration'=> $this->year.'-09-02T09:00:00+03:00',
            'EndRegistration'=>$this->year.'-09-20T17:00:00+03:00',



            'TestLocation'=>'г. Пенза, Пензенский государственный университет, '.$this->name.", ауд. ".$this->aud,
            'IdSubject'=>$this->id_superservice,
            'Comment'=>$this->name_sub.$payment,
            'IsIntramural'=>'true',
            'ReserveDate'=>'false',
            'MaxCountEntrants'=>40,
            // 'subject_id'=>$this->subject_id 
        ];
    }
}
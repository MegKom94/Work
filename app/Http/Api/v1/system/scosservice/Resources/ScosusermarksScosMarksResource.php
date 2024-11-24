<?php
namespace App\Http\Api\v1\system\scosservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScosusermarksScosMarksResource extends JsonResource{

    function toArray($request){
        
        switch($this->mark_value){
			case 5: $markValue = 'Отл.'; break;
			case 4: $markValue = 'Хор.'; break;
			case 3: $markValue = 'Удовл.'; break;
            case 2: $markValue = 'Не удовл'; break;
            case 1: $markValue = 'Зачёт'; break;
            case 0: $markValue = 'Не зачёт'; break;
		}
        
        switch($this->mark_type){
			case 'MARK': $markType = 'Оценка'; break;
			case 'CREDIT': $markType = 'Зачёт'; break;
			case 'DIF_CREDIT': $markType = 'Дифференцированный зачёт'; break;
            default: $markType = 'Оценка'; break;
		}

        return [
            'mark_value'=>$markValue,
            'mark_type'=>$markType,
            'semester'=>$this->semester,
            'title'=>$this->title,
            'teacher'=>$this->teacher,
        ];
    }
}
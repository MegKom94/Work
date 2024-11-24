<?php
namespace App\Http\Api\v1\system\forms\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormsFormsResource extends JsonResource{

    function toArray($request){
        return [
            "id" => $this->id,
            "text" => $this->text,
            "weight" => $this->weight,
            "mnogo" => $this->mnogo,
            "is_use" => $this->is_use,
            "is_show" => $this->is_show,
            "is_other" => $this->is_other,
            "is_subject" => $this->is_subject,
            "date_create" => $this->date_create,
            "date_update" => $this->date_update,
            "is_konkurs" => $this->is_konkurs,
            "id_site" => $this->id_site,
            "id_type" => $this->id_type,
            "is_deleted" => $this->is_deleted,
            "FormsAnswers" => $this->FormsAnswers,
		];
    }
}
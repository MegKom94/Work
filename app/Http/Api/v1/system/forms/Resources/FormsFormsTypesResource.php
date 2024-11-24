<?php
namespace App\Http\Api\v1\system\forms\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\forms\Resources\FormsFormsResource;

class FormsFormsTypesResource extends JsonResource{

    function toArray($request){
        return [
            "id" => $this->id,
            "title" => $this->title,
            "id_site" => $this->id_site,
            "is_deleted" => $this->is_deleted,
            "weight" => $this->weight,
            "is_opros" => $this->is_opros,
            "is_student" => $this->is_student,
            "is_empl" => $this->is_empl,
            "is_subject" => $this->is_subject,
            "id_dep" => $this->id_dep,
            "date_begin" => $this->date_begin,
            "date_end" => $this->date_end,
            "answer_type" => $this->answer_type,
            "Forms" => FormsFormsResource::collection($this->Forms),
		];
    }
}
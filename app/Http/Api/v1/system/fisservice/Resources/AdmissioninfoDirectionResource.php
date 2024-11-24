<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\fisservice\Resources\AdmissioninfoCampaignsResource;

class AdmissioninfoDirectionResource extends JsonResource{

    function toArray($request){

		if($this->whenLoaded('Campaigns')->toArray() == []) return;
		if (!isset($this->HeadOrganization[0])) {
			return;
		}
        return [
			'id'=>$this->id,
			'name'=>$this->name,
			'code'=>$this->code,
			'shifr'=>$this->shifr,
			'id_dir'=>$this->id_dir,
			'id_fis'=>$this->id_fis,
			'id_superservice'=>$this->id_superservice,
			// 'o_b_sum' => $this->o_b_sum,
			'o_b'=>$this->o_b,
			'o_l'=>$this->o_l,
			'o_s'=>$this->o_s,
			'o_t'=>$this->o_t,
			'o_d'=>$this->o_d,
			'z_b'=>$this->z_b,
			'z_l'=>$this->z_l,
			'z_s'=>$this->z_s,
			'z_t'=>$this->z_t,
			'z_d'=>$this->z_d,
			'id_level'=>$this->id_level,
			'id_fisservice_level'=>$this->Levels->toArray()[0]['id_fisservice'],
			'year'=>$this->year,
			'exams'=>$this->exams,
			'label'=>$this->label,
			'length_o'=>$this->length_o,
			'date_start_o'=>$this->date_start_o,
			'date_finish_o'=>$this->date_finish_o,
			'length_z'=>$this->length_z,
			'date_start_z'=>$this->date_start_z,
			'date_finish_z'=>$this->date_finish_z,
			'length_oz'=>$this->length_oz,
			'date_start_oz'=>$this->date_start_oz,
			'date_finish_oz'=>$this->date_finish_oz,
			'moodle_id_o'=>$this->moodle_id_o,
			'moodle_id_z'=>$this->moodle_id_z,
			'moodle_id_oz'=>$this->moodle_id_oz,
			'program_name'=>$this->program_name,
			'department'=>$this->department,
			'moodle_department'=>$this->moodle_department,
			'moodle_department_z'=>$this->moodle_department_z,
			'showitem'=>$this->showitem,
			'oz_b'=>$this->oz_b,
			'oz_l'=>$this->oz_l,
			'oz_s'=>$this->oz_s,
			'oz_t'=>$this->oz_t,
			'oz_d'=>$this->oz_d,
			'head_id'=>$this->head_id,
			'gzgu_id'=>$this->gzgu_id,
			'is_med_doc_needed'=>$this->is_med_doc_needed,
			'is_mon'=>$this->is_mon,
			'is_foreign'=>$this->is_foreign,
			'is_military'=>$this->is_military,
			'is_deleted'=>$this->is_deleted,
			'show'=>$this->show,
			'Campaigns'=>AdmissioninfoCampaignsResource::collection($this->whenLoaded('Campaigns')),
            'HeadOrganization' => $this->HeadOrganization,

		];
    }
}
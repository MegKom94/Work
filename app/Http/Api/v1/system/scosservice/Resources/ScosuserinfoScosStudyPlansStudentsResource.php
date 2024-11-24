<?php

namespace App\Http\Api\v1\system\scosservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\scosservice\Resources\ScosuserinfoScosStudentsResource;

class ScosuserinfoScosStudyPlansStudentsResource extends JsonResource
{

	function toArray($request)
	{
		$students = $this->whenLoaded('ScosStudents')->toArray();
		if (isset($students[0])) $students = $students[0];

		$studyPlans = $this->whenLoaded('ScosStudyPlans')->toArray();
		if (isset($studyPlans[0])) $studyPlans = $studyPlans[0];

		switch ($studyPlans['education_form']) {
			case 'FULL_TIME':
				$studyPlans['education_form'] = 'Очно';
				break;
			case 'PART_TIME':
				$studyPlans['education_form'] = 'Очно-заочно';
				break;
			case 'EXTRAMURAL':
				$studyPlans['education_form'] = 'Заочно';
				break;
		}
		return [
			'surname' => isset($students['surname']) ? $students['surname'] : '-',
			'name' => isset($students['name']) ? $students['name'] : '-',
			'middle_name' => isset($students['middle_name']) ? $students['middle_name'] : '-',
			'email' => isset($students['email']) ? $students['email'] : '-',
			'educational_programs' => isset($studyPlans['scos_educational_programs'][0]['title']) ? $studyPlans['scos_educational_programs'][0]['title'] : '-',
			'studyPlan' => isset($studyPlans['title']) ? $studyPlans['title'] : '-',
			'direction' =>  isset($studyPlans['direction']) ? $studyPlans['direction']: '-',
			'code_direction' =>  isset($studyPlans['code_direction']) ? $studyPlans['code_direction']: '-',
			'start_year' =>  isset($studyPlans['start_year']) ? $studyPlans['start_year']: '-',
			'end_year' =>  isset($studyPlans['end_year']) ? $studyPlans['end_year']: '-',
			'education_form' =>  isset($studyPlans['education_form']) ? $studyPlans['education_form']: '-',
			//'marks'=>$marks,
		];
	}
}

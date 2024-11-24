<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class AdmissionEntranceTestPlaceEntity extends Entity{
    function __construct() {
        self::$models = [
            'CgExams',
			'Direction',
            'AbtSubjects',
            'ExamSchedule',
            'ExamSchedule.ExamBuildings',
		];

        self::$nameResource = "AdmissionEntranceTestPlace";
    }
}
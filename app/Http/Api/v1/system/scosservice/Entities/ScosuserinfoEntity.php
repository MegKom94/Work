<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScosuserinfoEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosStudyPlansStudents',
			'ScosStudyPlans',
            'ScosStudyPlans.ScosEducationalPrograms',
			'ScosStudents',
		];

        self::$nameResource = "ScosuserinfoScosStudyPlansStudents";
    }
}
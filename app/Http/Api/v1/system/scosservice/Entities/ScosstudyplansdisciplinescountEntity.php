<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScosstudyplansdisciplinescountEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosStudyPlansDisciplines',
		];

        //self::$nameResource = "ScosstudyplansdisciplinescountScosStudyPlansDisciplines";
    }
}
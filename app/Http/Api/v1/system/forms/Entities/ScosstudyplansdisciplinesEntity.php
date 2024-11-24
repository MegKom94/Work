<?php
namespace App\Http\Api\v1\system\forms\Entities;

use App\Http\sources\Entity;

class ScosstudyplansdisciplinesEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosStudyPlansDisciplines',
		];

        self::$nameResource = "ScosstudyplansdisciplinesScosStudyPlansDisciplines";
    }
}
<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScosstudyplansstudentsEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosStudyPlansStudents',
		];

        self::$nameResource = "ScosstudyplansstudentsScosStudyPlansStudents";
    }
}
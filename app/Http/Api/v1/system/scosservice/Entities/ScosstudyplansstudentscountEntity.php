<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScosstudyplansstudentscountEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosStudyPlansStudents',
		];

        //self::$nameResource = "ScosstudyplansstudentscountScosStudyPlansStudents";
    }
}
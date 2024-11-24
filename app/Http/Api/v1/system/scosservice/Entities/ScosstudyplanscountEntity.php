<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScosstudyplanscountEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosStudyPlans',
		];

        //self::$nameResource = "ScosstudyplanscountScosStudyPlans";
    }
}
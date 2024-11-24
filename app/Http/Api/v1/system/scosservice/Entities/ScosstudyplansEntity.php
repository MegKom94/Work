<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScosstudyplansEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosStudyPlans',
		];

        self::$nameResource = "ScosstudyplansScosStudyPlans";
    }
}
<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FistargetorgsEntity extends Entity{
    function __construct() {
        self::$models = [
			'TargetOrgs',
		];

        self::$nameResource = "FistargetorgsTargetOrgs";
    }
}
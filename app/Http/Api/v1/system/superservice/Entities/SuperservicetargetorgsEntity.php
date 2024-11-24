<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class SuperservicetargetorgsEntity extends Entity{
    function __construct() {
        self::$models = [
			'TargetOrgsDetailed',
		];

        self::$nameResource = "SuperservicetargetorgsTargetOrgs";
    }
}
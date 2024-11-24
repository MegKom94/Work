<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScosdisciplinesEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosDisciplines',
		];

        self::$nameResource = "ScosdisciplinesScosDisciplines";
    }
}
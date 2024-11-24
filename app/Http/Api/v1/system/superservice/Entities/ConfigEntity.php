<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class ConfigEntity extends Entity{
    function __construct() {
        self::$models = [
			'AbtConfig',
			'AbtDates',
		];

        self::$nameResource = "ConfigAbtConfig";
    }
}
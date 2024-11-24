<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class NumberGeneratorEntity extends Entity{
    function __construct() {
        self::$models = [
			'AbtNumberGenerator',
		];

        self::$minFields = 1;

        //self::$nameResource = "ProfilesclsAbtProfiles";
    }
}
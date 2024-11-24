<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class SchoolsEntity extends Entity{
    function __construct() {
        self::$models = [
			'Schools',
		];

        self::$isExist = true;
        //self::$nameResource = "ProfilesclsAbtProfiles";
    }
}
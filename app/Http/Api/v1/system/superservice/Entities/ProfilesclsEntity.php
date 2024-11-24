<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class ProfilesclsEntity extends Entity{
    function __construct() {
        self::$models = [
			'AbtProfiles',
		];

        self::$nameResource = "ProfilesclsAbtProfiles";
    }
}
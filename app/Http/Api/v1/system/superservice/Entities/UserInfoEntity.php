<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class UserInfoEntity extends Entity{
    function __construct() {
        self::$models = [
			'User',
		];

        self::$nameResource = "UserInfoUser";
    }
}
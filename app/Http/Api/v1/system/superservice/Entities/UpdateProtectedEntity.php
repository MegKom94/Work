<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class UpdateProtectedEntity extends Entity{
    function __construct() {
        self::$models = [
            'Docs',
            'User',
            'AbtAchievements',
		];
    }
}
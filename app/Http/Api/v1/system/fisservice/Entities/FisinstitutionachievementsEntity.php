<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisinstitutionachievementsEntity extends Entity{
    function __construct() {
        self::$models = [
			'Achievements', // было AbtAchievements
			'Campaigns',
		];

        self::$nameResource = "FisinstitutionachievementsAbtAchievements";
    }
}
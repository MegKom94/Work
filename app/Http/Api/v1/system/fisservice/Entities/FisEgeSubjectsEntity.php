<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisEgeSubjectsEntity extends Entity{
    function __construct() {
        self::$models = [
			'AbtSubjects',
            'Marks',
		];

        self::$nameResource = "FisEgeSubjects";
    }
}
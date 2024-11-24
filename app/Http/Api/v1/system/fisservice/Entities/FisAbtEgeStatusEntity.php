<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisAbtEgeStatusEntity extends Entity{
    function __construct() {
        self::$models = [
			'AbtFisEgeStatus',
		];

        self::$nameResource = "FisAbtEgeStatus";
        self::$minFields = 1;
    }
}
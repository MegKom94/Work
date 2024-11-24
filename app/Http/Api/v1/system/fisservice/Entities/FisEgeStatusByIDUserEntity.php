<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisEgeStatusByIDUserEntity extends Entity{
    function __construct() {
        self::$models = [
            'UserExecution',
			'AbtFisEgeStatus',
		];

        self::$nameResource = "FisEgeStatusByIDUser";
        self::$minFields = 1;
    }
}
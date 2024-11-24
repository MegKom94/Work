<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScoseducationalprogramsEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosEducationalPrograms',
		];

        self::$nameResource = "ScoseducationalprogramsScosEducationalPrograms";
    }
}
<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScoseducationalprogramscountEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosEducationalPrograms',
		];

        //self::$nameResource = "ScoseducationalprogramscountScosEducationalPrograms";
    }
}
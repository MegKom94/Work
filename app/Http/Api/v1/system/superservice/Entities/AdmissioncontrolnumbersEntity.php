<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class AdmissioncontrolnumbersEntity extends Entity{
    function __construct() {
        self::$models = [
			'Direction',
			'AbtProfiles',
		];

        self::$nameResource = "AdmissioncontrolnumbersDirection";
    }
}
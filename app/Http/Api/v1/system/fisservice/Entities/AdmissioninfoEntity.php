<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class AdmissioninfoEntity extends Entity{
    function __construct() {
        self::$models = [
			'Direction',
			'Competitions',
            'Levels',
            'Campaigns',
			'HeadOrganization',

		];

        self::$nameResource = "AdmissioninfoDirection";
    }
}
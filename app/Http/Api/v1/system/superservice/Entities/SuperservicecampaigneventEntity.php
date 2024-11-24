<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class SuperservicecampaigneventEntity extends Entity{
    function __construct() {
        self::$models = [
			'AbtDates',
			//'Levels',
		];

        self::$nameResource = "SuperservicecampaigneventAbtDates";
    }
}
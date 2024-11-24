<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class CountlogsEntity extends Entity{
    function __construct() {
        self::$models = [
			'SuperServiceLogs',
		];

        //self::$nameResource = "CountlogsSuperServiceLogs";
    }
}
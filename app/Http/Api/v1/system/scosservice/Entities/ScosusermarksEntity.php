<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScosusermarksEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosMarks',
		];

        self::$nameResource = "ScosusermarksScosMarks";
    }
}
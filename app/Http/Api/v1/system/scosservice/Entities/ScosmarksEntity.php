<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScosmarksEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosMarks',
		];

        self::$nameResource = "ScosmarksScosMarks";
    }
}
<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScosstudentscountEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosStudents',
		];

        //self::$nameResource = "ScosstudentscountScosStudents";
    }
}
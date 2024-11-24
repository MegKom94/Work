<?php
namespace App\Http\Api\v1\system\scosservice\Entities;

use App\Http\sources\Entity;

class ScosstudentsEntity extends Entity{
    function __construct() {
        self::$models = [
			'ScosStudents',
		];
        
        self::$nameResource = "ScosstudentsScosStudents";
    }
}
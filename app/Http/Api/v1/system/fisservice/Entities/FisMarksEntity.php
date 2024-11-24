<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisMarksEntity extends Entity{
    function __construct() {
        self::$models = [
			'Marks',
			'AbtSubjects',
		];

        self::$nameResource = "FisMarks";
    }
}
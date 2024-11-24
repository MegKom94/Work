<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisMarksOldEntity extends Entity{
    function __construct() {
        self::$models = [
			'MarksOld',
			'AbtSubjects',
		];

        self::$nameResource = "FisMarksOld";
    }
}
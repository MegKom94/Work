<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class MarksOldEntity extends Entity{
    function __construct() {
        self::$models = [
            'MarksOld',
		];

        self::$isExist = true;
        self::$nameResource = "Marks";
    }
}
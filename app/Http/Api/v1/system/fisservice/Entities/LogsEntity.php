<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class LogsEntity extends Entity{
    function __construct() {
        self::$models = [
			'FisServiceLogs',
		];

        self::$nameResource = "LogsFisServiceLogs";
    }
}
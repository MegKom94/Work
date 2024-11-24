<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class ContractsEntity extends Entity{
    function __construct() {
        self::$models = [
			'AsuContracts',
            'SuperServiceLogs'
		];

        self::$nameResource = "Contracts";
    }
}
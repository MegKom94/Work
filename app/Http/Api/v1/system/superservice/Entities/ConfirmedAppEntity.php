<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class ConfirmedAppEntity extends Entity{
    function __construct() {
        self::$models = [
			'App',
			'DocsStudy',
            'DocsIdentity',
            'CompGroups',
            'CompGroups.Competitions',
            'UserExecution',
		];

        self::$nameResource = "ConfirmedApp";
    }
}
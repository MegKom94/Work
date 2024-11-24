<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class OriginalDocumentEntity extends Entity{
    function __construct() {
        self::$models = [
			'App',
            'UserExecution',
            'UserExecution.User',
		];

        self::$nameResource = "OriginalDocument";
    }
}
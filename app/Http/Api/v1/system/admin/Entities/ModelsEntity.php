<?php
namespace App\Http\Api\v1\system\admin\Entities;

use App\Http\sources\Entity;

class ModelsEntity extends Entity{
    function __construct() {
        self::$models = [
			'ApiModels',
            'InformationSchema'
		];

        self::$nameResource = "ModelsApiModels";
    }
}
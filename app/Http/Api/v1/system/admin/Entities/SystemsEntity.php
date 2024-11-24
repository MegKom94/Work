<?php
namespace App\Http\Api\v1\system\admin\Entities;

use App\Http\sources\Entity;

class SystemsEntity extends Entity{
    function __construct() {
        self::$models = [
            'ApiSystems',
            'ApiEntities',
            'ApiEntities.ApiModels',
        ];

        self::$nameResource = 'System';
    }
}
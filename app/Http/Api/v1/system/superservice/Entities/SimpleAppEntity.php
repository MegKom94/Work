<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class SimpleAppEntity extends Entity{
    function __construct() {
        self::$models = [
            'App',
        ];

        self::$nameResource = '-';
    }
}
<?php
namespace App\Http\Api\v1\system\admin\Entities;

use App\Http\sources\Entity;

class EntitiesEntity extends Entity{
    function __construct() {
        self::$models = [
            'ApiEntities',
        ];

        //self::$minFields = 1;
    }
}
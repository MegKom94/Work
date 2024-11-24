<?php
namespace App\Http\Api\v1\system\admin\Entities;

use App\Http\sources\Entity;

class RightsEntity extends Entity{
    function __construct() {
        self::$models = [
            'ApiRights',
        ];
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class GuideEntity extends Entity{
    function __construct() {
        self::$models = [
            'App',
        ];
        
        //self::$nameResource = 'Guide';
    }
}

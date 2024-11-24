<?php
namespace App\Http\Api\v1\system\menu\Entities;

use App\Http\sources\Entity;

class MenuEntity extends Entity{
    function __construct() {
        self::$models = [
			'Menu',
            'Menu',
		];

        self::$nameResource = "MenuMenu";
    }
}
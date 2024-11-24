<?php
namespace App\Http\Api\v1\system\pages\Entities;

use App\Http\sources\Entity;

class PagesEntity extends Entity{
    function __construct() {
        self::$models = [
			'Pages',
		];

        self::$nameResource = "PagesPages";
        self::$readOnly='true';
    }
}
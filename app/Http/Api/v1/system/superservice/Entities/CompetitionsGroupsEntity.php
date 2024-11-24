<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class CompetitionsGroupsEntity extends Entity{
    function __construct() {
        self::$models = [
			'CompGroups',
		];


        self::$nameResource = 'CompetitionsGroups';
    }
}
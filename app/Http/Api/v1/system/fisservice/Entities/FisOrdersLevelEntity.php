<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisOrdersLevelEntity extends Entity{
    function __construct() {
        self::$models = [
			'Orders',
            // 'Levels',
            'Campaigns',
            'OrderTypes',
            'OrderSources',
            'CompGroups',
            // 'CompGroups.App.UserExecution',
            'CompGroups.Competitions.Direction',
            'CompGroups.Competitions.Direction.Levels',

            // 'CompGroups.App',
            // 'CompGroups.App.UserExecution',
            // 'CompGroups.Competitions',
            // 'CompGroups.Competitions.Direction',


            
		];

        self::$nameResource = "FisOrdersLevel";
    }
}
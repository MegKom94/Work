<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisAppWithOrdersEntity extends Entity{
    function __construct() {
        self::$models = [
            'CompGroups',
            'App.UserExecution',
            'Competitions.Direction',
            'Competitions.Direction.Levels',


            // 'CompGroups.App',
            // 'CompGroups.App.UserExecution',
            // 'CompGroups.Competitions',
            // 'CompGroups.Competitions.Direction',


            
		];

        self::$nameResource = "FisAppWithOrders";
    }
}
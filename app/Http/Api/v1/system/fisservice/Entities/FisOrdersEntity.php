<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisOrdersEntity extends Entity{
    function __construct() {
        self::$models = [
			'Orders',
            'Levels',
            'Campaigns',
            'OrderTypes',
            'OrderSources',
            // 'CompGroups.App',
            // 'CompGroups.App.UserExecution',
            // 'CompGroups.Competitions',
            // 'CompGroups.Competitions.Direction',


            
		];

        self::$nameResource = "FisOrders";
    }
}
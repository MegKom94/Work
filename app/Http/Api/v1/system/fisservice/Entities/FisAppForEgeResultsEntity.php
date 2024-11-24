<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisAppForEgeResultsEntity extends Entity{
    function __construct() {
        self::$models = [
			'App',
            'UserExecution.User',
            'UserExecution.UserAdd',
            // 'user',
            // 'Direction',
            'UserExecution.Docs',
            'CompGroups',
            'CompGroups.Competitions',
            'AbtFisEgeStatus',

          
            
		];
        

        self::$nameResource = "FisAppForEgeResults";
    }
}
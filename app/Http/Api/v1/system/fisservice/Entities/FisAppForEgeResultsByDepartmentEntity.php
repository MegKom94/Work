<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisAppForEgeResultsByDepartmentEntity extends Entity{
    function __construct() {
        self::$models = [
            'Direction',
            'Competitions',
            'Competitions.CompGroups',
			'CompGroups.App',
            'App.UserExecution',
            'UserExecution.User',
            // 'user',
            // 'Direction',
            'UserExecution.Docs',
            // 'AbtFisEgeStatus',

          
            
		];
        

        self::$nameResource = "FisAppForEgeResultsByDepartment";
    }
}
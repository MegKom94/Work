<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisEgeByDepartmentEntity extends Entity{
    function __construct() {
        self::$models = [
            // 'Direction',
            // 'Competitions',
            // 'Competitions.CompGroups',
			// 'CompGroups.App',
            // 'App.UserExecution',
            // 'UserExecution.User',
            // // 'user',
            // // 'Direction',
            // 'UserExecution.Docs',
            // // 'AbtFisEgeStatus',
            // 'AbtProfiles',

            
            'Competitions',
            'Direction',
            'CompGroups',
			'CompGroups.App',
            'App.UserExecution',
            'UserExecution.User',
            // 'UserExecution.Docs',
            'AbtProfiles',

          
            
		];
        

        self::$nameResource = "FisEgeByDepartment";
    }
}
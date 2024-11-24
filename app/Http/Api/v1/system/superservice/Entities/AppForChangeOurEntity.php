<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class AppForChangeOurEntity extends Entity{
    function __construct() {
        // self::$models = [
        //     'App',
        //     'CompGroups',
        //     'CompGroups.Competitions',
        //     'UserExecution.User',
        // ];

        // self::$models = [
        //     'UserExecution',
        //     'User',
        //     'App',
        //     'SuperServiceLogs',
        //     'App.CompGroups',
        //     'App.CompGroups.Competitions',
        // ];

        self::$models = [
            'User',
            'UserExecution',
            'UserExecution.App',
            'SuperServiceLogs',
            'UserExecution.App.CompGroups',
            'UserExecution.App.CompGroups.Competitions',
        ];
        

        self::$nameResource = 'AppForChangeOur';
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class AppForTableEntity extends Entity{
    function __construct() {
        self::$models = [
            'App',
            // 'CompGroups',
            // 'CompGroups.Competitions',
            'UserExecution',
            'UserExecution.User',
            'UserExecution.SuperServiceLogs',
        ];

        self::$nameResource = 'AppForTableApp';
    }
}
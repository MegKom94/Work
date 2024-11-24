<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class AppForChangeEntity extends Entity{
    function __construct() {
        self::$models = [
            'App',
            'CompGroups',
            'UserExecution.Docs',
            'CompGroups.CompGroupsStatuses',
		];

        self::$isExist = true;
        self::$existExceptions = [
            'CompGroups.create_date',
            'CompGroups.update_date',
            'CompGroups.id_status',
        ];

        
        self::$nameResource = "AppForChange";
    }
}
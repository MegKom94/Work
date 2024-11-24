<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class LogsEntity extends Entity{
    function __construct() {
        self::$models = [
            'SuperServiceLogs',
            //'App',
        ];
        
        self::$nameResource = 'LogsSuperServiceLogs';

        self::$isExist = true;
        self::$existExceptions = [
            'SuperServiceLogs.id_user',
            'SuperServiceLogs.entity',
            'SuperServiceLogs.answer',
            'SuperServiceLogs.status',
            'SuperServiceLogs.date',
            'SuperServiceLogs.guid_app',
        ];
        // self::$nameResource = 'LogsSuperServiceLogsResource';
    }
}

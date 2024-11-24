<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class DocsScansEntity extends Entity{
    function __construct() {
        self::$models = [
            'User',
            'Docs',
            'SuperServiceLogs',
            'Docs.AbtScans',
            'UserExecution.App',
        ];

        self::$nameResource = 'DocsScans';
    }
}
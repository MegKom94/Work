<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisExecFromDocProtectedEntity extends Entity{
    function __construct() {
        self::$models = [
			// 'Docs',
            // 'UserExecution',
            // 'UserExecution.App',
            // 'UserExecution.App.CompGroups',

            'DocsIdentity',
            'App',
            'App.CompGroups',


            'UserExecution',
            'UserExecution.App',
            'UserExecution.App.CompGroups',
			// 'App',
		];

        self::$nameResource = "FisExecFromDocProtected";
    }
}
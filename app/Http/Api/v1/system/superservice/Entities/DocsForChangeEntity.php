<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class DocsForChangeEntity extends Entity{
    function __construct() {
        self::$models = [
            'User',
			'Docs',
            'Docs.AbtAchievements',
            'UserExecution',
            'UserExecution.App',
		];

        self::$isExist = true;
        self::$existExceptions = [
            'AbtAchievements.score',
            'Docs.id_status_superservice',
            'Docs.date',
        ];

        self::$nameResource = "DocsForChange";
    }
}
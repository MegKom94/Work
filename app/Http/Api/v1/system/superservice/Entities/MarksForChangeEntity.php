<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class MarksForChangeEntity extends Entity{
    function __construct() {
        // self::$models = [
        //     'ExamSchedule',
        //     'Marks',
        //     'Marks.UserExecution',
        //     'UserExecution.User',
		// ];

        self::$models = [
            'ExamSchedule',
            'MarksOld',
            'MarksOld.CompGroups',
            'CompGroups.App',
            'App.UserExecution',
            'UserExecution.User',
		];

        self::$isExist = true;
        self::$nameResource = "MarksForChange";
    }
}
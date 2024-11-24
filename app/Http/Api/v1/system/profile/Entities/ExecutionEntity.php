<?php
namespace App\Http\Api\v1\system\profile\Entities;

use App\Http\sources\Entity;

class ExecutionEntity extends Entity{
    function __construct() {
        self::$models = [
            'UserExecution',
            'Department',
            'UserExecutionKind',
        ]; 

        self::$nameResource = 'ExecutionExecution'; 
        self::$isClear = false;
        self::$readOnly = true;
    }
}
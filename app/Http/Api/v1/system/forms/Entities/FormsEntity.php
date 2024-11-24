<?php
namespace App\Http\Api\v1\system\forms\Entities;

use App\Http\sources\Entity;

class FormsEntity extends Entity{
    function __construct() {
        self::$models = [
			'FormTypes',
			'Form',
			'Form.FormsAnswers',
		];

        self::$nameResource = "FormsFormsTypes";
    }
}
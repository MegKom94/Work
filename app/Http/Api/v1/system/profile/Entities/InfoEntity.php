<?php
namespace App\Http\Api\v1\system\profile\Entities;

use App\Http\sources\Entity;

class InfoEntity extends Entity{
    function __construct() {
        self::$models = [
            'User',
            'UserAdd',
            'UserExecution.Department'
        ]; //Список моделей. Первая всегда главная.

        self::$nameResource = 'InfoUser'; //Файл ресурсов для основной(главной) модели.
        self::$isClear = false; //Очистка от нулевых значений.
        self::$readOnly = true; //Только для чтения.
    }
}
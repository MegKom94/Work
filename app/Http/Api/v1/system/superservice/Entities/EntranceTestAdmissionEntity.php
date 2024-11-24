<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class EntranceTestAdmissionEntity extends Entity{
    function __construct() {
        self::$models = [
            'Competitions',
            'CgExams',
            'Direction',
            'CgExams.AbtSubjects',
        ];

        self::$nameResource = 'EntranceTestAdmissionCompetitions';
    }
}
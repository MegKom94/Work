<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class CompetitionsEntity extends Entity{
    function __construct() {
        self::$models = [
			'Competitions',
			'Direction',
			'CompetitionsTypes',
			'Direction.Levels',
			'EducationForm',
			'AdmissionStages',
			'AbtProfiles',
			'Direction.Campaigns',
			'TargetOrgsGroups',
			'TargetOrgsDetailed',
			'TargetOrgsDetailed.Competitions',
		];
		
        self::$nameResource = "CompetitionsCompetitions";
    }
}
<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class InstitutionprogramsEntity extends Entity{
    function __construct() {
        self::$models = [
			'Competitions',
			'Direction',
			'CompetitionsTypes',
			'EducationForm',
			'TargetOrgsGroups', //Competitions.
			'AbtProfiles',
			'Direction.HeadOrganization',

		];

        self::$nameResource = "InstitutionprogramsCompetitions";
    }
}
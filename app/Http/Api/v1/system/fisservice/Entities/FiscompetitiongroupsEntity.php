<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FiscompetitiongroupsEntity extends Entity{
    function __construct() {
        self::$models = [
			'Competitions',
			'Direction',
			'CompetitionsTypes',
			'EducationForm',
			'TargetOrgsGroups',
			'TargetOrgsDetailed',
			'CgExams',
			'Direction.Campaigns',
			'Direction.HeadOrganization',
			// 'HeadOrganization',
			'AbtProfiles',
		];

        self::$nameResource = "FiscompetitiongroupsCompetitions";
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class AdmissionCampaignEventEntity extends Entity{
    function __construct() {
        self::$models = [
			'AbtTermsAdmission',
			'AbtAdmissionEvents',
            'Levels',
            'CompetitionsTypes',
            'EducationForm',
            'AdmissionStages'
		];

        self::$nameResource = "AdmissionCampaignEvent";
    }
}
<?php
namespace App\Http\Api\v1\system\fisservice\Entities;

use App\Http\sources\Entity;

class FisappEntity extends Entity{
    function __construct() {
        self::$models = [
			'App',
            'CompGroups',
            'CompGroups.Competitions',
            'CompGroups.Competitions.CgExams',

            'CompGroups.Competitions.Direction',
            'CompGroups.Competitions.Direction.HeadOrganization',

            // 'Marks',
            // 'Marks.AbtSubjects',

            'CompGroups.MarksOld',
            'CompGroups.MarksOld.AbtSubjects',


            // 'Direction',
            'UserExecution',
            'UserExecution.Docs',
            'UserExecution.Docs.DocsTypes',
            'UserExecution.Docs.DocsTypes.FisDocsTypes',
            // 'UserExecution.Docs',

            'UserExecution.User',
            'UserExecution.UserAdd',
            'UserExecution.UserAdd.Countries',
            
            'AbtAchievements',
            'AbtAchievements.Achievements',


            'AddInfoSource',
            
            'DocsIdentity',
            'DocsIdentity.DocsTypes',
            'DocsStudy',
            'DocsStudy.DocsTypes',
            'DocsStudy.DocsTypes.FisDocsTypes', // создать эту модель abt_fis_docs_types
            'DocsStudy.Schools',

            'UserExecution.DocsIdentityOther',
            'UserExecution.DocsIdentityOther.DocsTypes',
		];
        

        self::$nameResource = "FisappApp";
    }
}
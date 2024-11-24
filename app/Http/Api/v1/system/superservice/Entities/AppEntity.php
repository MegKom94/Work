<?php
namespace App\Http\Api\v1\system\superservice\Entities;

use App\Http\sources\Entity;

class AppEntity extends Entity{
    function __construct() {
        self::$models = [
            'App',
            'CompGroups',
            'CompGroups.Competitions',
            'UserExecution.User',
            'UserExecution.SuperServiceLogs',
            'UserExecution.UserAdd',
            'UserExecution.UserAdd.Countries',
            'UserExecution.UserFio',
            'DocsIdentity',
            'AddInfoSource',
            'DocsIdentity.DocsTypes',
            'DocsStudy',
            'DocsStudy.Schools',
            'DocsStudy.DocsTypes'
        ];

        self::$minFields = 2;
        self::$isExist = true;
        self::$existExceptions = [
            'User.id_user',
            'User.id_operator',
            'User.sex',
            'User.date_create',
            'User.tel',
            'User.email',
            'User.login',
            'User.password',
            'User.password_old',
            'User.password_hash',
            'User.date_passchange',
            'User.is_abt',
            'User.is_epgu',
            'User.guid_entrant',

            'UserExecution.personal_number',
            'UserExecution.date_create',
            'UserExecution.date_begin',
            'UserExecution.date_end',

            'UserFio.date', 

            'UserAdd.place_birth',

            // 'App.id_execution',
            'App.date_accept_first',
            'App.date_create',
            'App.id_identity_doc',
            'App.id_prev_study_doc',

            'CompGroups.date_create',

            'Docs.id_protected',
            'Docs.id_status_superservice',
            'Docs.date',
            'Docs.date_begin',
            'Docs.file_name',
            'Docs.id_lka_scan',
            'Docs.id_operator',
            'Docs.dop_info1',
            // 'Docs.dop_info2',
            // 'Docs.dop_info3',

            'DocsStudy.series',
            'DocsStudy.id_protected',
            'DocsStudy.dop_info1',
            'DocsStudy.dop_info2',
            'DocsStudy.dop_info3',
            'DocsStudy.date_begin',
            'DocsStudy.end',
            'DocsStudy.date',
            'DocsStudy.id_operator', 
            'DocsStudy.rights',
            'DocsStudy.file_name',
            'DocsStudy.ach_id',
            'DocsStudy.id_lka_scan',
            'DocsStudy.guid_doc',
            'DocsStudy.id_status_superservice',

            'DocsIdentity.id_protected',
            'DocsIdentity.dop_info1',
            'DocsIdentity.dop_info2',
            'DocsIdentity.dop_info3',
            'DocsIdentity.date_begin',
            'DocsIdentity.end',
            'DocsIdentity.date',
            'DocsIdentity.id_operator', 
            'DocsIdentity.rights',
            'DocsIdentity.file_name',
            'DocsIdentity.ach_id',
            'DocsIdentity.id_lka_scan',
            'DocsIdentity.guid_doc',
            'DocsIdentity.id_status_superservice',

            'DocsSnils.series',
            'DocsSnils.number',
            'DocsSnils.id_protected',
            'DocsSnils.dop_info1',
            'DocsSnils.dop_info2',
            'DocsSnils.dop_info3',
            'DocsSnils.date_begin',
            'DocsSnils.end',
            'DocsSnils.date',
            'DocsSnils.id_operator', 
            'DocsSnils.rights',
            'DocsSnils.file_name',
            'DocsSnils.ach_id',
            'DocsSnils.id_lka_scan',
            'DocsSnils.guid_doc',
            'DocsSnils.id_status_superservice',
        ];

        self::$nameResource = 'AppApp';
    }
}
<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Api\v1\system\fisservice\Resources\FisCompGroupsResource;
use App\Http\Api\v1\system\fisservice\Resources\FisappDocsResource;
use App\Http\Api\v1\system\fisservice\Resources\FisappEduDocsResource;
use App\Http\Api\v1\system\fisservice\Resources\FisappDocsBenefitsResource;
use App\Http\Api\v1\system\fisservice\Resources\FisappDocsOtherIdentityResource;




class FisappAppResource extends JsonResource
{
    public $is_adm_stage = 0;
    public $is_foreigner = 0;


    function isAfter11($id)
    {
        switch ($id) {
            case 20:
                return 1;
                break;
            case 33:
                return 0;
            default:
                return "";
                break;
        }
    }
    function isRF($school): string
    {

        //var_dump($this->Schools);

        if ($school["rf"] == 0) {
            return 99;
            # code...
        } else {
            return $school["rf"];
            # code...
        }
        return "";
    }
    function toArray($request)
    {
        $MarksOld = [];
        $arrays = [
            'user' => 'user',
            'userAdd' => 'user_add',
            'addresses' => 'addresses',
            // 'docs' => 'docs',
        ];
        if (isset($this->UserExecution->toArray()[0])) {
            $userExecution = $this->UserExecution->toArray()[0];
        } else {
            $userExecution = [];
            return;
        }

        if ($this->whenLoaded('CompGroups')->toJson() != '') {
            // if (null !== $this->whenLoaded('CompGroups')->toArray() && isset($this->CompGroups->toArray()[0])) {
            // echo "<pre>";
            // var_dump($this->CompGroups);
            // echo "</pre>";
            // exit;

            // $CompGroups = $this->CompGroups->toArray()[0];
            $CompGroups_Pre = $this->CompGroups->toArray();
            if (isset($CompGroups_Pre[0])) {
                $CompGroups = $this->CompGroups->toArray()[0];
            }else {
                // var_dump($this->id);
                return;
            }
            if ($CompGroups["competitions"] != []) {
                // echo  "aa1";

                $Competitions = $CompGroups["competitions"];
                if ($Competitions[0]["direction"] != []) {
                    $Direction = $Competitions[0]["direction"][0];
                    // надеюсь это выкидывает нафиг все заявления для мона и милитари
                    if ($Direction["is_mon"] == 1 || $Direction["is_military"] == 1) {
                        return;
                    }
                    // var_dump($Direction);
                    // echo  "aa1";

                } else {
                    // echo  "нет направления";

                    $Direction = [];
                    return; //"Заявлений удовлетворяющих выбранному фильтру не существует"
                }
            } else {
                // echo  "нет конкурса";

                $Competitions = [];
                return;
            }
            // var_dump($CompGroups);
            if ($CompGroups["marks_old"] != []) {
                $Competitions_full = $this->CompGroups->toArray();
                $MarksOld = [];
                // $MarksOld = $CompGroups["marks_old"];
                foreach ($Competitions_full as $key_co => $value_co) {
                    if (!isset($value_co['competitions'][0]['direction'][0])) {
                        unset($Competitions_full[$key_co]);
                        continue;
                    }
                    foreach ($value_co['marks_old'] as $key_ma => &$value_ma) {
                        // var_dump($Competitions_full[0]);
                        
                        // exit;
                        // var_dump();
                        // foreach ($CompGroups as $key_co => $value) {
                        //     # code...
                        // }
                        
                        if ($value_ma['checked'] == 0 || in_array($value_ma['exam_type'], [1,3]) ) {
                            unset($value_co['marks_old'][$key_ma]);
                        }
                        if ($value_co['id'] == $value_ma['id_comp_group']) {
                           // if (!isset($value_co['competitions'][0]['direction'])) {  // [0]['direction'][0]['is_mon'] == 1 || $value_co['competitions'][0]['direction'][0]['is_military'] == 1 
                                // foreach ($value_co['competitions'][0]['direction'] as $key_d => $value_d) {
                                //     var_dump($value_d['is_military']);
                                // }
                                // var_dump($value_co['competitions'][0]['direction'][0]);
                                // exit;
                            //     unset()
                            // }
                            if ($this->is_foreigner == 0 && $value_co['competitions'][0]['is_foreign'] == 1 ) {
                                $this->is_foreigner = 1;
                            }
                            if ($this->is_adm_stage == 0 && $value_co['competitions'][0]['id_admission_stage'] == 2) {
                                $this->is_adm_stage = 1;
                            }
                            if (isset($value_co['competitions'][0]['id_profile'])) {
                                foreach ($value_co['competitions'][0]['cg_exams'] as $key_cg => $value_cg) {
                                    if ($value_co['competitions'][0]['id_direction'] == $value_cg['spec_id']) {
                                        if ($value_co['competitions'][0]['id_profile'] == $value_cg['id_profile'] && $value_co['competitions'][0]['is_en'] == $value_cg['is_en']) {
                                            if ($value_ma['subject_id'] == $value_cg['subject_id']) {
                                                $value_ma += ['CompetitiveGroupUID' => 'comp_group_' . $value_co['competitions'][0]['id_direction'] . '_' .  $value_co['competitions'][0]['id_form'] . 
                                                            '_' .  $value_co['competitions'][0]['id_type'] . "_" .  $value_co['competitions'][0]['is_foreign'] . 
                                                            (isset( $value_co['competitions'][0]['is_en'])? '_' .  $value_co['competitions'][0]['is_en'] : "" ).
                                                            (isset( $value_co['competitions'][0]['id_profile']) ? '_profile_' .  $value_co['competitions'][0]['id_profile'] : '') . 
                                                            (isset( $value_co['competitions'][0]['id_detailed']) ? '_detailed_' .  $value_co['competitions'][0]['id_detailed'] : '') . 
                                                            ($value_co['competitions'][0]['id_admission_stage'] == 2  ? '_dop' : '') ,
                                                            ];
                                            }
                                               
                                        }
                                    }
                                }
                                // foreach ($variable as $key => $value) {
                                //     # code...
                                // }
                            }else {
                                // if ($value_co['competitions'][0]['id_direction'] == 3566) {
                                //     var_dump($value_co);
                                //     exit;
                                // }
                                $value_ma += ['CompetitiveGroupUID' => 'comp_group_' . $value_co['competitions'][0]['id_direction'] . '_' .  $value_co['competitions'][0]['id_form'] . 
                                                '_' .  $value_co['competitions'][0]['id_type'] . "_" .  $value_co['competitions'][0]['is_foreign'] . 
                                                (isset( $value_co['competitions'][0]['is_en'])? '_' .  $value_co['competitions'][0]['is_en'] : "" ).
                                                (isset( $value_co['competitions'][0]['id_profile']) ? '_profile_' .  $value_co['competitions'][0]['id_profile'] : '') . 
                                                (isset( $value_co['competitions'][0]['id_detailed']) ? '_detailed_' .  $value_co['competitions'][0]['id_detailed'] : '') . 
                                                ($value_co['competitions'][0]['id_admission_stage'] == 2  ? '_dop' : '') ,
                                            ];
                            }
                                    
                                    # code...
                            
                            
                            # code...
                            $MarksOld[] = $value_ma;
                        }
                        # code...
                    }
                    unset($value_ma);
                    # code...
                }
                foreach ($MarksOld as $key_mar => $value_mar) {
                    if (!isset($value_mar['CompetitiveGroupUID'])) {
                        unset($MarksOld[$key_mar]);
                    }
                    # code...
                }
                // $MarksOld = 
            }else {
                // $MarksOld = [];
            }
        } else {
            // echo  "нет комп групп";

            $CompGroups = [];
            return;
        }

        // if ($Direction != []) {
        //     # code...
        // }

        // var_dump($userExecution);
        foreach ($arrays as $key => $array) {
            if (isset($userExecution[$array])) {
                if (isset($userExecution[$array][0])) {
                    $$key = $userExecution[$array][0];
                    // echo  "aa";

                } else {
                    // var_dump($array);
                    // echo "aaaa";

                    return;
                }
            } else {
                $$key = [];
            }
        }

        // if(!isset($addresses['countries']['0'])){
        //     return;
        // }
        if (isset($this->DocsIdentity->toArray()[0])) {
            $docsIdentityArray = $this->DocsIdentity->toArray()[0];

        }else {
            // echo "net pasporta";
            return;
        }
        // var_dump($docsIdentityArray);

        // $docsEduArray_test = $this->DocsStudy->toArray()[0];
        // var_dump($docsEduArray_test);
        // $docsEduCollection = "";
        // $docsEduCollection = FisappEduDocsResource::collection($this->DocsStudy); // $this->DocsStudy, 
        // echo "aaa1";

        $docsEduArray = (isset($this->DocsStudy->toArray()[0]) ? $this->DocsStudy->toArray()[0] : "");
        if ($docsEduArray == "") {
            return;
        }
        // echo "aaa2";
        $opa = 0;
        $Competitions_full = $this->CompGroups->toArray();
        foreach ($Competitions_full as $key_d => $value_d) {
            if ($value_d['competitions'][0]['is_foreign'] == 1) {
                $opa += 1;
                # code...
            }
            # code...
        }

        // нужно чтобы знать после спо чел или нет. Чтобы указать это в конкурсных группах ради правильного вывода ВИ
        if (in_array($docsEduArray['id_type'], [22,23, 122, 123]) || $opa > 0 || $this->is_foreigner) {
            $IsForSPOandVO = 1;
        }else {
            $IsForSPOandVO = 0;
        }
        if (in_array($docsEduArray['id_type'], [20]) ) {
            $is_school_diploma = 1;
        }
        // $IsForSPOandVO = $docsEduArray['id_type'] == 22;
        
        // var_dump($docsEduArray);

        // Документ об образовании
        $docsEduArray_right = [];
        // var_dump(isset($docsEduArray['schools'][0]));
        if (isset($docsEduArray['docs_types'][0]) && isset($docsEduArray['docs_types'][0]["fis_docs_types"][0]) && isset($docsEduArray['schools'][0])) {
            $docsEduArray_right = [
                $docsEduArray['docs_types'][0]["fis_docs_types"][0]["xml_tag"] => [
                    "UID" => "edu_doc_" . $Direction['year'] . "_" . $docsEduArray['id'] . "_". $userExecution['id_user'] . "_" . $this->id . ($this->is_adm_stage == 1? "_dop" : "") ,
                    'OriginalReceivedDate' => date("Y-m-d", $this->date_create), // оксана сказала так
                    'DocumentSeries' => $docsEduArray['series'],
                    'DocumentNumber' => $docsEduArray['number'],
                    'DocumentDate' => date("Y-m-d", $docsEduArray['date_begin']),
                    'DocumentOrganization' => $docsEduArray['dop_info1'],
                    'RegionId' => $this->isRF($docsEduArray['schools'][0]),

                ],
            ];
        }

        // var_dump($docsEduArray_right);
        /*
            по словам Максима Appbenefits не работают в фисе. Все доки он подгружал как "иной документ" в ApplicationВocuments
            скорее всего придется делать так же, но надо будет документы родителей\законных представителей правильно обработать
        */
        // echo  "aa1";

        foreach ($userExecution['docs'] as $key => &$doc) {
            if (in_array($doc["id"], [$docsIdentityArray['id'], $docsEduArray['id']])) {
                unset($userExecution['docs'][$key]);
            }
        }
        unset($doc);

        // var_dump($userExecution['docs']);
        // в коллекцию надо обязательно объект. Так как нужная таблица тянется по связке с другой,
        // то в момент когда её необходимо использовать, она уже превращена в array.
        // следующая строка красиво превращает нужную мне под-аррейку в объект, необходимый для отправки в коллекцию.
        // $object = json_decode(json_encode($userExecution['docs']), FALSE);

        // так, тут надо разделить. Походу придется делать 3 разных ресурса. жесть мусора будет. 
        // В идеале в них отправлять нужное, но придется все походу
        // по другому не получится, ибо их надо достаточно высоко размещать в ответе...
        // $docsBenefits = FisappDocsBenefitsResource::collection($object);

        // $docsBenefits = FisappDocsBenefitsResource::collection($this->UserExecution[0]->Docs);
        $docsBenefits = $this->UserExecution[0]->Docs->toArray();
        $docsBenefits_right = [];
        foreach ($docsBenefits as $key => $doc) {
            // var_dump($doc);
            if (isset($doc['docs_types'][0]["id_special_rights"])) {
                $docsBenefits_right[$key]['UID'] = "doc_" . $doc["id"] . "_" . $doc['docs_types'][0]["id_special_rights"];

                $docsBenefits_right[$key]['DocumentTypeID'] = $doc['docs_types'][0]["id_fisservice"];
                $docsBenefits_right[$key]['BenefitKindID'] = "Это особые данные, которых нет из справочника 30 _____" . $doc['docs_types'][0]["id_fisservice"];


                switch ($doc['docs_types'][0]["id_special_rights"]) {
                    case '2':
                        $docsBenefits_right[$key]['DocumentReason'] = [
                            "OrphanDocument"  => [
                                "OrphanCategoryID" => $doc['docs_types'][0]["id_fisservice"],  // это правильно, 42 справочник
                                "DocumentDate" => date("Y-m-d H:i:s", $doc['date_begin']),
                                "DocumentOrganization" => $doc['dop_info1'],
                                "DocumentName" => $doc['docs_types'][0]["name"],
                                "DocumentSeries" => (isset($doc['series'])? $doc['series'] : ""),
                                "DocumentNumber" => (isset($doc['number'])? $doc['number'] : ""),


                            ],
                        ];
                        break;

                    case '3':
                        $docsBenefits_right[$key]['DocumentReason'] = [
                            "MedicalDocument"  => [
                                "BenefitDocument" => [
                                    "DisabilityDocument" => [
                                        "DocumentDate" => (isset($doc['date_begin'])?date("Y-m-d H:i:s", $doc['date_begin']):""),
                                        "DocumentOrganization" => (isset($doc['dop_info1'])?$doc['dop_info1']:""),
                                        // "DocumentName" => $doc['docs_types'][0]["name"],
                                        "DocumentSeries" => $doc['series'], // (isset($doc['series'])? $doc['series'] : "")
                                        "DocumentNumber" => $doc['number'], // (isset($doc['number'])? $doc['number'] : "")
                                        "DisabilityTypeID" => $doc['docs_types'][0]["name"],
                                    ]

                                ]
                              


                            ],
                        ];

                        // if (condition) {
                        //     # code...
                        // }

                        /*  "OrphanCategoryID" => $doc['docs_types'][0]["id_fisservice"],  // это правильно, 42 справочник
                                "DocumentDate" => date("Y-m-d H:i:s", $doc['date_begin']),
                                "DocumentOrganization" => $doc['dop_info1'],
                                "DocumentName" => $doc['docs_types'][0]["name"],
                                "DocumentSeries" => (isset($doc['series'])? $doc['series'] : ""),
                                "DocumentNumber" => (isset($doc['number'])? $doc['number'] : ""),
                                */ 
                        break;    
                    case '8':
                        $docsBenefits_right[$key]['DocumentReason'] = [
                            "SeparateQuotaDocument"  => [
                                "DocumentTypeID" => $doc['docs_types'][0]["id_fisservice"],  // это неправильно, должен быть 31 справочник
                                "DocumentDate" => date("Y-m-d H:i:s", $doc['date_begin']),
                                "DocumentOrganization" => $doc['dop_info1'],
                                // "DocumentName" => $doc['docs_types'][0]["name"],
                                "DocumentSeries" => (isset($doc['series'])? $doc['series'] : ""),
                                "DocumentNumber" => (isset($doc['number'])? $doc['number'] : ""),

                            ],
                        ];
                        break;
    
                    default:
                        $docsBenefits_right[$key]['DocumentReason'] = [
                            "drugoe"  => [
                                "drugoeID" => $doc['docs_types'][0]["id_fisservice"],  // там не правильные числа, надо как-то решать
                                "DocumentDate" => date("Y-m-d H:i:s", $doc['date_begin']),
                                "DocumentOrganization" => $doc['dop_info1'],
                                "DocumentName" => $doc['docs_types'][0]["name"],
                                "DocumentSeries" => (isset($doc['series'])? $doc['series'] : ""),
                                "DocumentNumber" => (isset($doc['number'])? $doc['number'] : ""),

                            ],
                        ];
                        break;
                }
            }
        }
        // echo  "aa1";

        // var_dump($docsBenefits);
        // var_dump($this->UserExecution[0]->Docs);
        // $ddd = json_decode($docsBenefits->toJson());
        // foreach ($ddd as $key => $value) {
        //     // var_dump($value);
        //     if ($value == null) {
        //         unset($ddd[$key]);
        //     }
        // }

        // var_dump($ddd);
        // exit;
        // foreach ($docsBenefits as $key => $value) {
        //     
        // }


        // echo "aaa2";

        // как то в фисе странно, в доксАпликейшон походу вообще все добавляется. Я чет не хочу. 
        // Думаю один айдентити и еду док туда только добавлять. Это ужас.


        $AppDocsOtherIdentity = $this->UserExecution[0]->DocsIdentityOther->toArray();
        // var_dump($AppDocsOtherIdentity);
        $pep = [];
        foreach ($AppDocsOtherIdentity as $key => $value) {
            if (
                !in_array($value["id_type"], [1, 2, 3, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 172])
                || in_array($value['id'], [$docsIdentityArray['id'], $docsEduArray['id']]) || $value["is_deleted"] == 1
            ) {
                // var_dump($value);
                unset($AppDocsOtherIdentity[$key]);
            } else {
                array_push($pep, $value['id'] );
                $AppDocsOtherIdentity_right[] = [
                    "IdentityDocument" => [
                        "UID" => "IdentityDocumentOther_" . $value['id'] . "_" . $userExecution['id_user'] . "_" . $this->id . ($this->is_adm_stage == 1? "_dop" : "") ,
                        'LastName' => $user['lastname'],
                        'FirstName' => $user['firstname'],
                        'OriginalReceivedDate' => date("Y-m-d", $this->date_create),
                        'MiddleName' => (isset($user['secondname']) ? $user['secondname'] : ""),
                        'GenderID' => ($user['sex'] == '1' ? 1 : 2),
                        'IdentityDocumentTypeID' => $value['docs_types'][0]['id_fisservice'],
                        'NationalityTypeID' => $userAdd["countries"][0]["id_fisservice"], // заменить на страну
                        'BirthDate' => date("Y-m-d", $userAdd['date_birth']),
                        'BirthPlace' => $userAdd['place_birth'],
                        'DocumentDate' => date("Y-m-d", $value['date_begin']),

                        // 'doc_release_country_id' => $userAdd["countries"][0]["id_fisservice"],
                        // 'doc_release_place' => $userAdd["countries"][0]["name"],

                    ],
                ];
            }
        }
        // var_dump($AppDocsOtherIdentity);

        // $AppDocsOtherIdentity = FisappDocsOtherIdentityResource::collection($this->UserExecution[0]->Docs);
        // echo  "aa1";

        // $ddd1 = json_decode($AppDocsOtherIdentity->toJson());
        // foreach ($ddd1 as $key => $value) {
        //     if ($value == null) {
        //         unset($ddd1[$key]);
        //     }
        // }



        // ПОЗЖЕ ПОПРАВИть
        // var_dump($this->UserExecution[0]->Docs);
        // $AppDocs = FisappDocsResource::collection($this->UserExecution[0]->Docs);
        $AppDocs = $this->UserExecution[0]->Docs->toArray();
        // var_dump($this->UserExecution[0]->Docs->toArray());
        // echo  "aa1";
        // $pep = [];
        // if ($pep != []) {
            // array_push($pep, $docsIdentityArray['id']);
            // array_push($pep, $docsEduArray['id']); // так как для достижений нужно чтобы документ был в кастом документс

        // }else {
        //     array_push($pep, $docsIdentityArray['id'], $docsEduArray['id']);
        // }



        // TODO: надо обязательно к каждому доку еще что-то уникальное приписывать, либо удалять плохие заявления.
        //  Ибо загрузил заявление, а абиту лдаже юзера удалили и сделали все новое, а вот UID доков совпадал и в ошибку
        $AppDocsFormatted = [];
        foreach ($AppDocs as $key => $doc) {
            if ($doc["is_deleted"] == 0
            // && $doc["docs_types"][0]["is_identity"] == 0
            && isset($doc['dop_info1'])
            && $doc["id_type"] != 179
            ) { // !in_array($doc['docs_types'][0]["id"], [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 172])   // && !in_array($doc['id'], $pep )
                // IndividualAchievement   ["CustomDocument"]  ["CustomDocument"]
                $AppDocsFormatted[$key]['UID'] = "doc_" . $doc["id"]  . "_" . $userExecution['id_user'] . "_" . $this->id . ($this->is_adm_stage == 1? "_dop" : "") ;

                $AppDocsFormatted[$key]['DocumentName'] = $doc['docs_types'][0]["name"];

                $AppDocsFormatted[$key]['DocumentSeries'] = (isset($doc['series'])? $doc['series']: "");

                $AppDocsFormatted[$key]['DocumentNumber'] = $doc['number'];

                $AppDocsFormatted[$key]['DocumentDate'] = date("Y-m-d", $doc['date_begin']);

                $AppDocsFormatted[$key]['DocumentOrganization'] = $doc['dop_info1'];

                $AppDocsFormatted[$key]['OriginalReceivedDate'] = date("Y-m-d", $this->date_create);




                // $achFormated[$key]["IndividualAchievement"]["IAMark"] = (isset($ach['score'])? $ach['score'] : 0);

                // $achFormated[$key]["IndividualAchievement"]["IADocumentUID"] = "doc_" .  $ach["id_document"];  
                // . "_" . $ach['achievements'][0]['id_fisservice']  // . $this->id_execution . "_" . 
            }
        }


        // $ddd2 = json_decode($AppDocs->toJson());
        // foreach ($ddd2 as $key => $value) {
        //     if ($value == null) {
        //         unset($ddd2[$key]);
        //     }
        // }


        // это надо сделать тогда. 
        // $docsIndividualAchivements = FisappDocsIndividualAchivementsResource::collection($object);
        $docs_protected = array_column($userExecution['docs'], 'id', 'id_protected');
        foreach ($docs_protected as $key_a => $value_a) {
            if ($key_a == "") {
                unset($docs_protected[$key_a]);
            }
            # code...
        }
        // var_dump(array_column($userExecution['docs'], 'id', 'id_protected'));
        // var_dump($docs_protected);
        // $ddddddddd = $docs_protected;

        // foreach ($docs_protected as $key => $value) {
        //         if ($key == "") {
        //             unset($docs_protected[$key]);
        //         }
        // }
        // $docs_protected = [];
        // foreach ($userExecution['docs'] as $keyDocs => &$valueDocs) {
        //     if (isset($valueDocs["id_protected"])) {
        //         // $docs_protected += [$value["id_protected"] => $value["id"]];
        //         $docs_protected[$valueDocs["id"]] = $valueDocs["id_protected"];
        //         // array_push($docs_protected, [$value["id_type"] => $value["id_protected"]]);
        //     }
        //     # code...
        // }
        // unset($valueDocs);


        // $docsIdentityTypes = $docsIdentityArray['docs_types'];

        // $docsEduArray1 = $this->DocsStudy->toArray()[0];

        // $docsEduArray1['Marks'] = $this->Marks->toArray();
        // var_dump( $docsEduArray1["Marks"]);

        // $objectEdu = json_decode(json_encode($docsEduArray1), FALSE);
        // var_dump($objectEdu);
        // var_dump("EJJJO");

        // var_dump($Direction);


        // $docsEduArray = $docsEduCollection->toJson();
        // так как не вернулось заявлений с подходящим подразделением, то ничего не возвращаем соответственно
        if ($Direction["head_organization"] == []) {
            return;
        }
        // var_dump($Direction["head_organization"]);

        // exit;
        // echo "<pre>";
        // var_dump(strlen($docsBenefits->toJson())-10);
        // var_dump((strlen($docsBenefits->toJson())-10)/$docsBenefits->count()/4);
        // var_dump($docsBenefits->count(null));

        // echo "</pre>";

        // TODO: держать id_fisservice в таблице ach всегда правильной.
        $achArray = $this->AbtAchievements->toArray();

        // var_dump($achArray);
        $achFormated = [];
        foreach ($achArray as $key => $ach) {
            if ($ach["is_deleted"] == 0 && $ach['is_checked'] == 2  && $ach['score'] > 0) {
                // IndividualAchievement ["IndividualAchievement"]
                $achFormated[$key]['IAUID'] = "IA_" . $Direction['year'] . "_" . $ach['id_ach']
                    . "_" . $Direction['id_level'] . "_" . $ach['achievements'][0]['id_fisservice']
                    . "_" . $ach['id'] . "_" . $this->id . ($this->is_adm_stage == 1? "_dop" : "") ;

                $achFormated[$key]['InstitutionAchievementUID'] = "Institutional_achievement_" . $Direction['year']
                    . "_" . $ach['id_ach'] . "_" . ($Direction['id_level'] == 93 ? 2 : $Direction['id_level'])
                    . "_" . $ach['achievements'][0]['id_fisservice'];

                $achFormated[$key]["IAMark"] = (isset($ach['score']) ? $ach['score'] : 0);

                $achFormated[$key]["IADocumentUID"] = "doc_" .  $ach["id_document"] . "_" . $userExecution['id_user'] . "_" . $this->id . ($this->is_adm_stage == 1? "_dop" : "") ;
                // . "_" . $ach['achievements'][0]['id_fisservice']  // . $this->id_execution . "_" . 
            }
        }
        // if (condition) {
        //     # code...
        // }

        // var_dump($docsEduArray['id_type']);
        // var_dump($this::isAfter11($docsEduArray['id_type']));


        // TODO: СДЕЛАТЬ ОБРАБОТКУ ОЦЕНОК ИЗ ТАБЛИЦЫ МАРКС ОЛД

        return [
            'id' => $this->id,
            'id_user' => $userExecution['id_user'],
            'is_foreigner' => $this->is_foreigner,
            'id_status' => $CompGroups['id_status'],
            "id_level_ForMarksOld" => $this->id_level,
            'is_school_diploma' => (isset($is_school_diploma) ? $is_school_diploma : 0),
            'doc_protected' => (isset($docsIdentityArray['id_protected']) ? $docsIdentityArray['id_protected'] : ""),
            'docs_protected' => (isset($docs_protected) ? json_decode(json_encode($docs_protected)) : ""),
            // 'docs_protected' => $docs_protected,

            // 'uid_app' => $Competitions,
            'uid_app' => "app_" . $Direction['year'] . "_" . $userExecution['id_user'] . "_" . $this->id_execution . "_" . $this->id,
            'is_from_epgu' => ($this->id_source == 4 ? 1 : 0),
            'app_number' => "app_" . $Direction['year'] . "_" . $userExecution['id_user'] . "_" . $this->id_execution . "_" . $this->id,

            'Entrant' => [
                'uid_entrant' => "entrant_" . $Direction['year'] . "_" . $userExecution['id_user'] . "_" . $this->id_execution,
                'lastname' => $user['lastname'],
                'firstname' => $user['firstname'],
                'secondname' => $user['secondname'],
                'gender' => ($user['sex'] == '1' ? 1 : 2),
                'snils' => '',
                'email' => ($user['email'] ? $user['email'] : "1@1.ru"),
                // 'addresses' => $addresses,


            ],
                                // НАДО ЗАМЕНИТЬ ДАТУ ПРИНЯТИЯ НА НАСТОЯЩУЮ ДАТУ РЕГИСТРАЦИИ, Я ЛОх  было $this->date_accept_first
            'registration_date' => date_format(date_create(date("Y-m-d", $this->date_create)), "c"),    // date_format(date_create($this->date_accept_first), 'c'), // date("Y-m-d", $this->date_accept_first),
            'registration_date_for_delete_prev' => date_format(date_create(date("Y-m-d", $this->date_create)), "c"), 
            'need_hostel' => $this->is_need_hostel,
            'status_id' => "2", // 2 - новое
            'After11' =>  $this->isAfter11($docsEduArray['id_type']),

            // 'id_user' => $this->id_user,
            // 'id_exec' => $this->id_execution,

            // 'rate' => ($userExecution['rate'] == 1 ? 'true' : 'false'),
            // 'phone_mob' => $user['tel'],
            // 'is_first_edu' => $this->is_first_edu,
            // 'is_test' => $this->is_test,
            // 'IdStageAdmission' => ($this->id_admission_stage == 2 ? 4 : $this->id_admission_stage),
            'CompetitiveGroupList' => FisCompGroupsResource::collection($this->CompGroups),
            'isForSpoAndVo' => ($IsForSPOandVO? 1:0),
            'AppDocs' => [
                // 'idid' => $this->DocsIdentity,
                // 'identity_docs' => FisDocsIdentityResource::collection($this->DocsIdentity),
                'identity_doc' => [
                    // 'all' => $docsIdentityArray,
                    'doc_id' => "doc_identity_" . $docsIdentityArray['id'] . "_" . $userExecution['id_user'] . "_" . $this->id . ($this->is_adm_stage == 1? "_dop" : "") ,
                    // 'doc_series' => "Это вытащить из защищенного контура " . $docsIdentityArray['series'],
                    // 'doc_number' => "Это вытащить из защищенного контура " . $docsIdentityArray['number'],
                    // 'doc_code' => $docsIdentityArray['dop_info2'],
                    'doc_date' => date("Y-m-d",$docsIdentityArray['date_begin']),
                    // 'doc_organization' => $docsIdentityArray['dop_info1'],
                    'doc_type' => $docsIdentityArray['docs_types'][0]['id_fisservice'],
                    'doc_nation' => $userAdd["countries"][0]["id_fisservice"], // заменить на страну
                    'birthdate' => date("Y-m-d", $userAdd['date_birth']),
                    'birthplace' => $userAdd['place_birth'],
                    'original_resv_date_ident_doc' => date("Y-m-d", $this->date_create),
                    'doc_release_country_id' => $userAdd["countries"][0]["id_fisservice"],
                    'doc_release_place' => $userAdd["countries"][0]["name"],
                ],
                // 'edu_doc' => [
                //     'edu_doc_fis_xml_tag' => $docsEduArray['docs_types'][0]["fis_docs_types"][0]["xml_tag"],
                //     'edu_doc_id' => "doc_prev_study_" . $docsEduArray['id'],
                //     'edu_doc_date' => date("Y-m-d", $docsEduArray['date']),
                //     'edu_doc_series' => $docsEduArray['series'],
                //     'edu_doc_number' => $docsEduArray['number'],
                //     'edu_doc_date_begin' => date("Y-m-d", $docsEduArray['date_begin']), // date_format(date_create($docsEduArray['date_begin']), 'c'), //date("Y-m-d", $docsEduArray['date_begin']),
                //     'edu_doc_release_org' => $docsEduArray['dop_info1'],
                //     'edu_doc_type' => $docsEduArray['docs_types'][0]['id_fisservice'],
                //     'edu_doc_name' => $docsEduArray['docs_types'][0]['name'],
                //     'edu_doc_region_id' => $region_id,


                // ]
                'edu_doc' => ($docsEduArray_right != [] ? $docsEduArray_right : ""), // $docsEduCollection,
                // 'other_docs' => ($ddd2 != [] ? $AppDocs : ""),
                'other_docs' => ($AppDocsFormatted != []? $AppDocsFormatted : ""),
                'OtherIdentityDocs' => ($AppDocsOtherIdentity != [] ? $AppDocsOtherIdentity_right : ""),
                'Marks' => ($this->Marks->toArray() != [] ? $this->Marks : ""),
                'MarksOld' => ($MarksOld != [] ? $MarksOld : ""),

                // 'eee' => $userExecution['docs'],
                
                // "oooo" => $this->UserExecution[0]->Docs,

            ],

            'ApplicationCommonBenefits' => ($docsBenefits_right == [] ? "" : $docsBenefits_right),


            'IA' => ($achFormated != [] ? $achFormated : ""),
        ];
    }
}
//$this->whenLoaded('Campaigns')
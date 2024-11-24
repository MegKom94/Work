<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
// use App\Http\Api\v1\system\fisservice\Resources\FisCompGroupsResource;
// use App\Http\Api\v1\system\fisservice\Resources\FisIdentityDocsResource;


class FisappEduDocsResource extends JsonResource
{

    // function isAfter11($id)
    // {
    //     switch ($id) {
    //         case '20':
    //             return true;
    //             break;
    //         case '33':
    //             return false;
    //         default:
    //             return "";
    //             break;
    //     }
    // }

    function isRF() : string {

        //var_dump($this->Schools);

        if ($this->Schools[0]->rf == 0) {
            return 99;
            # code...
        } else {
            return $this->Schools[0]->rf;
            # code...
        }
        return "";
    }
    function toArray($request)
    {
        // return $this->docs;
        // return $this->id;
        // $docs = $this->docs->toArray();
        // $docs_types = $this->DocsTypes->toArray()[0];
        // echo "<pre>";
        // var_dump($this->DocsTypes);
        // echo "</pre>";

        if ($this->is_deleted == 1) {
            // echo "док об образовании удален";
            return;
        } elseif(isset($this->id)) {
            // var_dump($this->docs_types[0]->fis_docs_types[0]->xml_tag);
            // var_dump(json_decode($this->docs_types));
            // echo "Эсрань";

            // оценки сюда доставить
            $answer = [
                $this->DocsTypes[0]->FisDocsTypes[0]->xml_tag => [
                        'UID' => $this->id,
                        'DocumentSeries' => $this->series,
                        'DocumentNumber' => $this->number,

                        'DocumentDate' => date("Y-m-d", $this->date),
                        'DocumentOrganization' => $this->dop_info1,
                        'RegionId' => $this->isRF(),
                        // 'tt' => $this->DocsTypes[0]->FisDocsTypes[0]->xml_tag,

                        // 'is_deleted' => $this->is_deleted,
                        // ($this->docs_types[0]->id_special_rights == 2 ? "OrphanCategoryID": "somethingelse" ) => $this->docs_types[0]->id_fisservice,

                        ]
                    ];
            return $answer; 
        } else {
            // echo "док об образовании чет хз че таое]";

            return;
        }

    }
}


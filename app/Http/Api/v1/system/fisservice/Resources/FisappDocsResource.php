<?php

namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Api\v1\system\fisservice\Resources\FisappEduDocsMarksResource;


class FisappDocsResource extends JsonResource
{

    function toArray($request)
    {
        // var_dump($request->);
        // echo "jop";
        // var_dump("EJJJO");

        if ($this->is_deleted == 1) { //|| $this->docs_types[0]->id_fisservice == 0
            // echo "jop";

            return;
        } else {
            // var_dump("EJJJO");

            // switch ($this->id_type) {
            //     case '172':
            //         $xml_tag = 
            //         break;

            //     default:
            //         # code...
            //         break;
            // }
            // var_dump($this->DocsTypes);
            if (isset($this->DocsTypes[0])) {
                // var_dump("EJJJO");

                if (in_array($this->DocsTypes[0]->id, [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 172])) {
                    return;
                } else {

                    return ["CustomDocument" => [
                        'UID' => "doc_" . $this->id,
                        // 'id_type' => $this->id_type,
                        'DocumentName' => $this->DocsTypes[0]->name,
                        'DocumentSeries' => $this->series,
                        'DocumentNumber' => $this->number,

                        // "DocumentTypeID" => $this->docs_types[0]->id_fisservice,
                        'DocumentDate' => date("Y-m-d", $this->date_begin),
                        'DocumentOrganization' => $this->dop_info1,
                        // "ddid" => $this->id_subject,
                        // 'subjects' => FisappEduDocsMarksResource::collection($this->Marks),
                        // 'is_deleted' => $this->is_deleted,
                        // ($this->docs_types[0]->id_special_rights == 2 ? "OrphanCategoryID": "somethingelse" ) => $this->docs_types[0]->id_fisservice,

                    ]];
                }
            }
        }
    }
} //2

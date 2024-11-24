<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
// use App\Http\Api\v1\system\fisservice\Resources\FisCompGroupsResource;
// use App\Http\Api\v1\system\fisservice\Resources\FisIdentityDocsResource;
// date_default_timezone_set('GMT');


class FisappDocsBenefitsResource extends JsonResource
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
    function toArray($request)
    {
        // echo  "aa1";

        // return $this->docs;
        // return $this->id;
        // $docs = $this->docs->toArray();
        // var_dump($this);
        if ( $this->DocsTypes[0]->id_fisservice == 0) { // $this->is_deleted == 1 ||
            return;
        } elseif (isset($this->DocsTypes[0]->id_special_rights)) {
            // var_dump($this->DocsTypes[0]->id_special_rights);
            /* 
                хоспаде, почему у единственного документа реально являющегося подтверждением того,
                что она сирота, нет id_special_rights??? как я их должен выделять тогда?
                а у него еще и названия никакого нет... это просто запись в базе данных.... 272449
                какой же ужас. Я теперь понимаю почему у максима все документы это иные документы......../
            */


            /* 
                вот так вроде лучше, надо только как-то это универсально сделать, через базу видимо я хз. 
                далее надо дату документа привести к ебучему московскому времени правильному. Иначе даты не правильные будут, как сейчас
            */
            return ["ApplicationCommonBenefit" => [
                'UID' => $this->id,
                "DocumentTypeID" => $this->DocsTypes[0]->id_fisservice,
                "DocumentReason" => [
                    ($this->DocsTypes[0]->id_special_rights == 2 ? "OrphanDocument" : "somethingelse") => [
                        ($this->DocsTypes[0]->id_special_rights == 2 ? "OrphanCategoryID" : "somethingelse") => $this->DocsTypes[0]->id_fisservice,
                        "DocumentDate" => date("Y-m-d H:i:s", $this->date_begin),
                        "DocumentOrganization" => $this->dop_info1,
                    ]
                ],

            ]];
        } else {
            return;
        }
    }
}
//$this->whenLoaded('Campaigns')

<?php
namespace App\Http\Api\v1\system\fisservice\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
// use App\Http\Api\v1\system\fisservice\Resources\FisCompGroupsResource;
// use App\Http\Api\v1\system\fisservice\Resources\FisIdentityDocsResource;
// date_default_timezone_set('GMT');


class FisappAbtAchievementsResource extends JsonResource
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
        if ( $this->is_deleted == 1 ) { // $this->is_deleted == 1 || $this->DocsTypes[0]->id_fisservice == 0
            return;
        } elseif (isset($this->id_ach)) {
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
            return ["IndividualAchievement" => [
                'IAUID' => $this->id,
                "DocumentTypeID" => $this->docs_types[0]->id_fisservice,
                "DocumentReason" => [
                    ($this->docs_types[0]->id_special_rights == 2 ? "OrphanDocument" : "somethingelse") => [
                        // 'is_deleted' => $this->is_deleted,
                        ($this->docs_types[0]->id_special_rights == 2 ? "OrphanCategoryID" : "somethingelse") => $this->docs_types[0]->id_fisservice,
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

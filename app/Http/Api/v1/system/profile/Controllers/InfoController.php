<?php
namespace App\Http\Api\v1\system\profile\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\profile\Entities\InfoEntity;
use App\Http\sources\Mixin;


class InfoController extends Controller{
    use Mixin;

    function index(Request $request){
        $infoEntity = new InfoEntity;

        $list = [
            'worker'=>[
                'fio',
                'workPhone',
                'gender',
            ],
            'superuser'=>[
                'fio',
                'birthdate',
                'personalPhone',
                'workPhone',
                'email',
                'gender',
                'number',
                'photo',
                'image',
                'UserAdd',
                'UserExp',
                //'Department',
            ],
            'user'=>[
                'fio',
                'gender',
                //'Department',
            ],
            'visitor'=>[
                'fio',
            ]
        ];

        $idDep = 161626355;

        return $infoEntity::get($request->all(), $list, $idDep, 'whiteList');

        //$tt = $infoEntity::get($request->all());
        //$tt = json_decode(json_encode($tt, JSON_UNESCAPED_UNICODE), true)["original"];
        
        //return $this->whiteList($list, $tt, $idDep);
        //return $this->blackList($list, $tt, $idDep);
    }

    function store(Request $request){
        $infoEntity = new InfoEntity;
        return $infoEntity::set($request->all());
    }

    function show($id){
        $infoEntity = new InfoEntity;

        $list = [
            'worker'=>[
                'fio',
                'workPhone',
                'gender',
            ],
            'superuser'=>[
                'fio',
                'birthdate',
                'personalPhone',
                'workPhone',
                'email',
                'gender',
                'number',
                'photo',
                'image',
                'UserAdd',
                'UserExp',
                //'Department',
            ],
            'user'=>[
                'fio',
                'gender',
            ],
            'visitor'=>[
                'fio',
            ]
        ];

        $idDep = 31391769;

        return $infoEntity::get($id, $list, $idDep,'whiteList');


        //$tt = $infoEntity::get($id);
        // $tt = json_decode(json_encode($tt, JSON_UNESCAPED_UNICODE), true)["original"];
        
        // return $this->whiteList($list, $tt, $idDep);
        //return $this->blackList($list, $tt, $idDep);
    }
}
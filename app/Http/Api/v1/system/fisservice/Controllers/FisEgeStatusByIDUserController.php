<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FisEgeStatusByIDUserEntity ;



class FisEgeStatusByIDUserController  extends Controller{
    
    function index(Request $request){
        $Entity = new FisEgeStatusByIDUserEntity;
        return $Entity::get($request->all(), type: "");
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $Entity = new FisEgeStatusByIDUserEntity;
            return  $Entity::get($request->all(), type: "");
        }
        elseif('POST'){
            $Entity = new FisEgeStatusByIDUserEntity;
            return  $Entity::set($request->all());
        }
        else return 'WITHOUT METHOD';
    }

    function show($id){
        $Entity = new FisEgeStatusByIDUserEntity;
        return $Entity::get($id);
    }
}
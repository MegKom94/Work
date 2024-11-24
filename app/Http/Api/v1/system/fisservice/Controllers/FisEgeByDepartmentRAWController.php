<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FisEgeByDepartmentRAWEntity ;



class FisEgeByDepartmentRAWController  extends Controller{
    
    function index(Request $request){
        $Entity = new FisEgeByDepartmentRAWEntity;
        return $Entity::get($request->all(), type: "raw");
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $Entity = new FisEgeByDepartmentRAWEntity;
            return  $Entity::get($request->all(), type: "raw");
        }
        elseif('POST'){
            $Entity = new FisEgeByDepartmentRAWEntity;
            return  $Entity::set($request->all());
        }
        else return 'WITHOUT METHOD';
    }

    function show($id){
        $Entity = new FisEgeByDepartmentRAWEntity;
        return $Entity::get($id);
    }
}
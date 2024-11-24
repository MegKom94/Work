<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FisEgeByDepartmentEntity ;



class FisEgeByDepartmentController  extends Controller{
    
    function index(Request $request){
        $FisEntity = new FisEgeByDepartmentEntity;
        return $FisEntity::get($request->all(), type: "");
    }

    function store(Request $request){
        $FisEntity = new FisEgeByDepartmentEntity;
        return $FisEntity::set($request->all());
    }

    function show($id){
        $FisEntity = new FisEgeByDepartmentEntity;
        return $FisEntity::get($id);
    }
}
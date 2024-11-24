<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FisAppForEgeResultsByDepartmentEntity ;



class FisAppForEgeResultsByDepartmentController  extends Controller{
    
    function index(Request $request){
        $FisAppForEgeResultsByDepartmentEntity = new FisAppForEgeResultsByDepartmentEntity;
        return $FisAppForEgeResultsByDepartmentEntity::get($request->all(), type: "");
    }

    function store(Request $request){
        $FisAppForEgeResultsByDepartmentEntity = new FisAppForEgeResultsByDepartmentEntity;
        return $FisAppForEgeResultsByDepartmentEntity::set($request->all());
    }

    function show($id){
        $FisAppForEgeResultsByDepartmentEntity = new FisAppForEgeResultsByDepartmentEntity;
        return $FisAppForEgeResultsByDepartmentEntity::get($id);
    }
}
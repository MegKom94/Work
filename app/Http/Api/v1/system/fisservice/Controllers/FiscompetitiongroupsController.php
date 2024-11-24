<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FiscompetitiongroupsEntity;



class FiscompetitiongroupsController extends Controller{
    
    function index(Request $request){
        $fiscompetitiongroupsEntity = new FiscompetitiongroupsEntity;
        return $fiscompetitiongroupsEntity::get($request->all());
    }

    function store(Request $request){
        $fiscompetitiongroupsEntity = new FiscompetitiongroupsEntity;
        return $fiscompetitiongroupsEntity::set($request->all());
    }

    function show($id){
        $fiscompetitiongroupsEntity = new FiscompetitiongroupsEntity;
        return $fiscompetitiongroupsEntity::get($id);
    }
}
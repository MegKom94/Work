<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FisAppWithOrdersEntity;



class FisAppWithOrdersController extends Controller{
    
    function index(Request $request){
        $FisAppWithOrdersEntity = new FisAppWithOrdersEntity;
        return $FisAppWithOrdersEntity::get($request->all());
    }

    function store(Request $request){
        $FisAppWithOrdersEntity = new FisAppWithOrdersEntity;
        return $FisAppWithOrdersEntity::set($request->all());
    }

    function show($id){
        $FisAppWithOrdersEntity = new FisAppWithOrdersEntity;
        return $FisAppWithOrdersEntity::get($id);
    }
}
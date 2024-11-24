<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\AppForChangeEntity;



class AppForChangeController extends Controller{
    
    function index(Request $request){
        $appForChangeEntity = new AppForChangeEntity;
        return $appForChangeEntity::get($request->all());
    }

    function store(Request $request){
        $appForChangeEntity = new AppForChangeEntity;
        return $appForChangeEntity::set($request->all());
    }

    function show($id){
        $appForChangeEntity = new AppForChangeEntity;
        return $appForChangeEntity::get($id);
    }
}
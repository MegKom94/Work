<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\ConfigEntity;



class ConfigController extends Controller{
    
    function index(Request $request){
        $configEntity = new ConfigEntity;
        return $configEntity::get($request->all());
    }

    function store(Request $request){
        $configEntity = new ConfigEntity;
        return $configEntity::set($request->all());
    }

    function show($id){
        $configEntity = new ConfigEntity;
        return $configEntity::get($id);
    }
}
<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScoseducationalprogramsEntity;



class ScoseducationalprogramsController extends Controller{
    
    function index(Request $request){
        $scoseducationalprogramsEntity = new ScoseducationalprogramsEntity;
        return $scoseducationalprogramsEntity::get($request->all());
    }

    function store(Request $request){
        $scoseducationalprogramsEntity = new ScoseducationalprogramsEntity;
        return $scoseducationalprogramsEntity::set($request->all());
    }

    function show($id){
        $scoseducationalprogramsEntity = new ScoseducationalprogramsEntity;
        return $scoseducationalprogramsEntity::get($id);
    }
}
<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScoseducationalprogramscountEntity;



class ScoseducationalprogramscountController extends Controller{
    
    function index(Request $request){
        $scoseducationalprogramscountEntity = new ScoseducationalprogramscountEntity;
        return $scoseducationalprogramscountEntity::get($request->all());
    }

    function store(Request $request){
        $scoseducationalprogramscountEntity = new ScoseducationalprogramscountEntity;
        return $scoseducationalprogramscountEntity::set($request->all());
    }

    function show($id){
        $scoseducationalprogramscountEntity = new ScoseducationalprogramscountEntity;
        return $scoseducationalprogramscountEntity::get($id);
    }
}
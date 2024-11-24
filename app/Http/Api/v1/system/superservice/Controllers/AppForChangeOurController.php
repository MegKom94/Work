<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\AppForChangeOurEntity;



class AppForChangeOurController extends Controller{
    
    function index(Request $request){
        $appForChangeOurEntity = new AppForChangeOurEntity;
        return $appForChangeOurEntity::get($request->all());
    }

    function store(Request $request){
        $appForChangeOurEntity = new AppForChangeOurEntity;
        return $appForChangeOurEntity::set($request->all());
    }

    function show($id){
        $appForChangeOurEntity = new AppForChangeOurEntity;
        return $appForChangeOurEntity::get($id);
    }
}
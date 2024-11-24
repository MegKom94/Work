<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\ProfilesclsEntity;



class ProfilesclsController extends Controller{
    
    function index(Request $request){
        $profilesclsEntity = new ProfilesclsEntity;
        return $profilesclsEntity::get($request->all());
    }

    function store(Request $request){
        $profilesclsEntity = new ProfilesclsEntity;
        return $profilesclsEntity::set($request->all());
    }

    function show($id){
        $profilesclsEntity = new ProfilesclsEntity;
        return $profilesclsEntity::get($id);
    }
}
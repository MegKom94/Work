<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\UserInfoEntity;



class UserInfoController extends Controller{
    
    function index(Request $request){
        $userInfoEntity = new UserInfoEntity;
        return $userInfoEntity::get($request->all());
    }

    function store(Request $request){
        $userInfoEntity = new UserInfoEntity;
        return $userInfoEntity::set($request->all());
    }

    function show($id){
        $userInfoEntity = new UserInfoEntity;
        return $userInfoEntity::get($id);
    }
}
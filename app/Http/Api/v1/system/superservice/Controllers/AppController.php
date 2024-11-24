<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\AppEntity;


class AppController extends Controller{
    
    function index(Request $request){
        $appEntity = new AppEntity;
        return  $appEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $appEntity = new AppEntity;
            return  $appEntity::get($request->all());
        }
        else{
            $appEntity = new AppEntity;
            return  $appEntity::set($request->all());
        }
    }

    function show($id){
        $appEntity = new AppEntity;
        return  $appEntity::get($id);
    }
}
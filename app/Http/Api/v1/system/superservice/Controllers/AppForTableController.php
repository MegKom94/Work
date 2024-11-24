<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\AppForTableEntity;


class AppForTableController extends Controller{
    
    function index(Request $request){
        $appForTableEntity = new AppForTableEntity;
        return $appForTableEntity::get($request->all(), type: '');
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $appForTableEntity = new AppForTableEntity;
            return $appForTableEntity::get($request->all(), type: '');
        }
        else{
            $appForTableEntity = new AppForTableEntity;
            return $appForTableEntity::set($request->all());
        }
    }

    function show($id){
        $appForTableEntity = new AppForTableEntity;
        return $appForTableEntity::get($id);
    }
}
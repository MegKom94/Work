<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\SimpleAppEntity;


class SimpleAppController extends Controller{
    
    function index(Request $request){
        $simpleAppEntity = new SimpleAppEntity;
        return  $simpleAppEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $simpleAppEntity = new SimpleAppEntity;
            return  $simpleAppEntity::get($request->all());
        }
        else{
            $simpleAppEntity = new SimpleAppEntity;
            return  $simpleAppEntity::set($request->all());
        }
    }

    function show($id){
        $simpleAppEntity = new SimpleAppEntity;
        return  $simpleAppEntity::get($id);
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\CountEntity;



class CountController extends Controller{
    
    function index(Request $request){
        $countEntity = new CountEntity;
        return $countEntity::get($request->all());
    }

    function store(Request $request){
        $countEntity = new CountEntity;
        return $countEntity::set($request->all());
    }

    function show($id){
        $countEntity = new CountEntity;
        return $countEntity::get($id);
    }
}
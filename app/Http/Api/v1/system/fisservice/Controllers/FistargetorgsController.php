<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FistargetorgsEntity;



class FistargetorgsController extends Controller{
    
    function index(Request $request){
        $fistargetorgsEntity = new FistargetorgsEntity;
        return $fistargetorgsEntity::get($request->all());
    }

    function store(Request $request){
        $fistargetorgsEntity = new FistargetorgsEntity;
        return $fistargetorgsEntity::set($request->all());
    }

    function show($id){
        $fistargetorgsEntity = new FistargetorgsEntity;
        return $fistargetorgsEntity::get($id);
    }
}
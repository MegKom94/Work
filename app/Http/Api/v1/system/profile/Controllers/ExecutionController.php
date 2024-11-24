<?php
namespace App\Http\Api\v1\system\profile\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\profile\Entities\ExecutionEntity;



class ExecutionController extends Controller{
    
    function index(Request $request){
        $executionEntity = new ExecutionEntity;
        return $executionEntity::get($request->all());
    }

    function store(Request $request){
        $executionEntity = new ExecutionEntity;
        return $executionEntity::set($request->all());
    }

    function show($id){
        $executionEntity = new ExecutionEntity;
        return $executionEntity::get($id);
    }
}
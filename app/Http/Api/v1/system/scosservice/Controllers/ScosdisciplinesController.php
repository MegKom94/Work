<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosdisciplinesEntity;



class ScosdisciplinesController extends Controller{
    
    function index(Request $request){
        $scosdisciplinesEntity = new ScosdisciplinesEntity;
        return $scosdisciplinesEntity::get($request->all());
    }

    function store(Request $request){
        $scosdisciplinesEntity = new ScosdisciplinesEntity;
        return $scosdisciplinesEntity::set($request->all());
    }

    function show($id){
        $scosdisciplinesEntity = new ScosdisciplinesEntity;
        return $scosdisciplinesEntity::get($id);
    }
}
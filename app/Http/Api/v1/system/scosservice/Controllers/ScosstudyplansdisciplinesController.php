<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosstudyplansdisciplinesEntity;



class ScosstudyplansdisciplinesController extends Controller{
    
    function index(Request $request){
        $scosstudyplansdisciplinesEntity = new ScosstudyplansdisciplinesEntity;
        return $scosstudyplansdisciplinesEntity::get($request->all());
    }

    function store(Request $request){
        $scosstudyplansdisciplinesEntity = new ScosstudyplansdisciplinesEntity;
        return $scosstudyplansdisciplinesEntity::set($request->all());
    }

    function show($id){
        $scosstudyplansdisciplinesEntity = new ScosstudyplansdisciplinesEntity;
        return $scosstudyplansdisciplinesEntity::get($id);
    }
}
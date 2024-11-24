<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosstudentsEntity;



class ScosstudentsController extends Controller{
    
    function index(Request $request){
        $scosstudentsEntity = new ScosstudentsEntity;
        return $scosstudentsEntity::get($request->all());
    }

    function store(Request $request){
        $scosstudentsEntity = new ScosstudentsEntity;
        return $scosstudentsEntity::set($request->all());
    }

    function show($id){
        $scosstudentsEntity = new ScosstudentsEntity;
        return $scosstudentsEntity::get($id);
    }
}
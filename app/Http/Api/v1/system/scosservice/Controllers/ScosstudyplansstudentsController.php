<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosstudyplansstudentsEntity;



class ScosstudyplansstudentsController extends Controller{
    
    function index(Request $request){
        $scosstudyplansstudentsEntity = new ScosstudyplansstudentsEntity;
        return $scosstudyplansstudentsEntity::get($request->all());
    }

    function store(Request $request){
        $scosstudyplansstudentsEntity = new ScosstudyplansstudentsEntity;
        return $scosstudyplansstudentsEntity::set($request->all());
    }

    function show($id){
        $scosstudyplansstudentsEntity = new ScosstudyplansstudentsEntity;
        return $scosstudyplansstudentsEntity::get($id);
    }
}
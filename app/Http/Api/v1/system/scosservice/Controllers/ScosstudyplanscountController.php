<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosstudyplanscountEntity;



class ScosstudyplanscountController extends Controller{
    
    function index(Request $request){
        $scosstudyplanscountEntity = new ScosstudyplanscountEntity;
        return $scosstudyplanscountEntity::get($request->all());
    }

    function store(Request $request){
        $scosstudyplanscountEntity = new ScosstudyplanscountEntity;
        return $scosstudyplanscountEntity::set($request->all());
    }

    function show($id){
        $scosstudyplanscountEntity = new ScosstudyplanscountEntity;
        return $scosstudyplanscountEntity::get($id);
    }
}
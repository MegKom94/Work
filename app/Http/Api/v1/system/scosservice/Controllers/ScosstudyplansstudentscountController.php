<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosstudyplansstudentscountEntity;



class ScosstudyplansstudentscountController extends Controller{
    
    function index(Request $request){
        $scosstudyplansstudentscountEntity = new ScosstudyplansstudentscountEntity;
        return $scosstudyplansstudentscountEntity::get($request->all());
    }

    function store(Request $request){
        $scosstudyplansstudentscountEntity = new ScosstudyplansstudentscountEntity;
        return $scosstudyplansstudentscountEntity::set($request->all());
    }

    function show($id){
        $scosstudyplansstudentscountEntity = new ScosstudyplansstudentscountEntity;
        return $scosstudyplansstudentscountEntity::get($id);
    }
}
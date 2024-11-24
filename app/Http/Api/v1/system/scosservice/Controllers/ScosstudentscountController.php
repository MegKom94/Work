<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosstudentscountEntity;



class ScosstudentscountController extends Controller{
    
    function index(Request $request){
        $scosstudentscountEntity = new ScosstudentscountEntity;
        return $scosstudentscountEntity::get($request->all());
    }

    function store(Request $request){
        $scosstudentscountEntity = new ScosstudentscountEntity;
        return $scosstudentscountEntity::set($request->all());
    }

    function show($id){
        $scosstudentscountEntity = new ScosstudentscountEntity;
        return $scosstudentscountEntity::get($id);
    }
}
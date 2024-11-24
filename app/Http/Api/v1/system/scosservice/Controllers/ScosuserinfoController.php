<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosuserinfoEntity;



class ScosuserinfoController extends Controller{
    
    function index(Request $request){
        $scosuserinfoEntity = new ScosuserinfoEntity;
        return $scosuserinfoEntity::get($request->all());
    }

    function store(Request $request){
        $scosuserinfoEntity = new ScosuserinfoEntity;
        return $scosuserinfoEntity::set($request->all());
    }

    function show($id){
        $scosuserinfoEntity = new ScosuserinfoEntity;
        return $scosuserinfoEntity::get($id);
    }
}
<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosusermarksEntity;



class ScosusermarksController extends Controller{
    
    function index(Request $request){
        $scosusermarksEntity = new ScosusermarksEntity;
        return $scosusermarksEntity::get($request->all());
    }

    function store(Request $request){
        $scosusermarksEntity = new ScosusermarksEntity;
        return $scosusermarksEntity::set($request->all());
    }

    function show($id){
        $scosusermarksEntity = new ScosusermarksEntity;
        return $scosusermarksEntity::get($id);
    }
}
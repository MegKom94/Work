<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosmarksEntity;



class ScosmarksController extends Controller{
    
    function index(Request $request){
        $scosmarksEntity = new ScosmarksEntity;
        return $scosmarksEntity::get($request->all());
    }

    function store(Request $request){
        $scosmarksEntity = new ScosmarksEntity;
        return $scosmarksEntity::set($request->all());
    }

    function show($id){
        $scosmarksEntity = new ScosmarksEntity;
        return $scosmarksEntity::get($id);
    }
}
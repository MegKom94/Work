<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosmarkscountEntity;



class ScosmarkscountController extends Controller{
    
    function index(Request $request){
        $scosmarkscountEntity = new ScosmarkscountEntity;
        return $scosmarkscountEntity::get($request->all());
    }

    function store(Request $request){
        $scosmarkscountEntity = new ScosmarkscountEntity;
        return $scosmarkscountEntity::set($request->all());
    }

    function show($id){
        $scosmarkscountEntity = new ScosmarkscountEntity;
        return $scosmarkscountEntity::get($id);
    }
}
<?php
namespace App\Http\Api\v1\system\admin\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\admin\Entities\RightsEntity;



class RightsController extends Controller{
    
    function index(Request $request){
        $rightsEntity = new RightsEntity;
        return $rightsEntity::get($request->all());
    }

    function store(Request $request){
        $rightsEntity = new RightsEntity;
        return $rightsEntity::set($request->all());
    }

    function show($id){
        $rightsEntity = new RightsEntity;
        return $rightsEntity::get($id);
    }
}
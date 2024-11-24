<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\SuperservicetargetorgsEntity;



class SuperservicetargetorgsController extends Controller{
    
    function index(Request $request){
        $superservicetargetorgsEntity = new SuperservicetargetorgsEntity;
        return $superservicetargetorgsEntity::get($request->all());
    }

    function store(Request $request){
        $superservicetargetorgsEntity = new SuperservicetargetorgsEntity;
        return $superservicetargetorgsEntity::set($request->all());
    }

    function show($id){
        $superservicetargetorgsEntity = new SuperservicetargetorgsEntity;
        return $superservicetargetorgsEntity::get($id);
    }
}
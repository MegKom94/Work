<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosstudyplansEntity;



class ScosstudyplansController extends Controller{
    
    function index(Request $request){
        $scosstudyplansEntity = new ScosstudyplansEntity;
        return $scosstudyplansEntity::get($request->all());
    }

    function store(Request $request){
        $scosstudyplansEntity = new ScosstudyplansEntity;
        return $scosstudyplansEntity::set($request->all());
    }

    function show($id){
        $scosstudyplansEntity = new ScosstudyplansEntity;
        return $scosstudyplansEntity::get($id);
    }
}
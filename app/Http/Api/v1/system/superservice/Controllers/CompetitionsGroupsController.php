<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\CompetitionsGroupsEntity;



class CompetitionsGroupsController extends Controller{
    
    function index(Request $request){
        $competitionsGroupsEntity = new CompetitionsGroupsEntity;
        return $competitionsGroupsEntity::get($request->all());
    }

    function store(Request $request){
        $competitionsGroupsEntity = new CompetitionsGroupsEntity;
        return $competitionsGroupsEntity::set($request->all());
    }

    function show($id){
        $competitionsGroupsEntity = new CompetitionsGroupsEntity;
        return $competitionsGroupsEntity::get($id);
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\CompetitionsEntity;



class CompetitionsController extends Controller{
    
    function index(Request $request){
        $competitionsEntity = new CompetitionsEntity;
        return $competitionsEntity::get($request->all());
    }

    function store(Request $request){
        $competitionsEntity = new CompetitionsEntity;
        return $competitionsEntity::set($request->all());
    }

    function show($id){
        $competitionsEntity = new CompetitionsEntity;
        return $competitionsEntity::get($id);
    }
}
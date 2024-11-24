<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\SchoolsEntity;



class SchoolsController extends Controller{
    
    function index(Request $request){
        $schoolsEntity = new SchoolsEntity;
        return $schoolsEntity::get($request->all());
    }

    function store(Request $request){
        $schoolsEntity = new SchoolsEntity;
        return $schoolsEntity::set($request->all());
    }

    function show($id){
        $schoolsEntity = new SchoolsEntity;
        return $schoolsEntity::get($id);
    }
}
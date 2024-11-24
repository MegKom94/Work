<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\MarksForChangeEntity;


class MarksForChangeController extends Controller{
    
    function index(Request $request){
        $marksForChangeEntity = new MarksForChangeEntity;
        return $marksForChangeEntity::get($request->all(), type: '');
    }

    function store(Request $request){
        $marksForChangeEntity = new MarksForChangeEntity;
        return $marksForChangeEntity::set($request->all());
    }

    function show($id){
        $marksForChangeEntity = new MarksForChangeEntity;
        return $marksForChangeEntity::get($id);
    }
}
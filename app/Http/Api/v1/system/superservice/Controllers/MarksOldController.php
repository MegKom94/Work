<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\MarksOldEntity;



class MarksOldController extends Controller{
    
    function index(Request $request){
        $marksOldEntity = new MarksOldEntity;
        return $marksOldEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $marksOldEntity = new MarksOldEntity;
            return $marksOldEntity::get($request->all());
        }
        else{
            $marksOldEntity = new MarksOldEntity;
            return $marksOldEntity::set($request->all());
        }
    }

    function show($id){
        $marksOldEntity = new MarksOldEntity;
        return $marksOldEntity::get($id);
    }
}
<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosdisciplinescountEntity;



class ScosdisciplinescountController extends Controller{
    
    function index(Request $request){
        $scosdisciplinescountEntity = new ScosdisciplinescountEntity;
        return $scosdisciplinescountEntity::get($request->all());
    }

    function store(Request $request){
        $scosdisciplinescountEntity = new ScosdisciplinescountEntity;
        return $scosdisciplinescountEntity::set($request->all());
    }

    function show($id){
        $scosdisciplinescountEntity = new ScosdisciplinescountEntity;
        return $scosdisciplinescountEntity::get($id);
    }
}
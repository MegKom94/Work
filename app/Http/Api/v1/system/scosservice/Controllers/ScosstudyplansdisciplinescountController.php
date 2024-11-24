<?php
namespace App\Http\Api\v1\system\scosservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\scosservice\Entities\ScosstudyplansdisciplinescountEntity;



class ScosstudyplansdisciplinescountController extends Controller{
    
    function index(Request $request){
        $scosstudyplansdisciplinescountEntity = new ScosstudyplansdisciplinescountEntity;
        return $scosstudyplansdisciplinescountEntity::get($request->all());
    }

    function store(Request $request){
        $scosstudyplansdisciplinescountEntity = new ScosstudyplansdisciplinescountEntity;
        return $scosstudyplansdisciplinescountEntity::set($request->all());
    }

    function show($id){
        $scosstudyplansdisciplinescountEntity = new ScosstudyplansdisciplinescountEntity;
        return $scosstudyplansdisciplinescountEntity::get($id);
    }
}
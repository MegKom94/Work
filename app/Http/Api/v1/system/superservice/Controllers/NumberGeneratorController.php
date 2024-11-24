<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\NumberGeneratorEntity;


class NumberGeneratorController extends Controller{
    
    function index(Request $request){
        $numberGeneratorEntity = new NumberGeneratorEntity;
        return $numberGeneratorEntity::get($request->all());
    }

    function store(Request $request){
        $numberGeneratorEntity = new NumberGeneratorEntity;
        return $numberGeneratorEntity::set($request->all());
    }

    function show($id){
        $numberGeneratorEntity = new NumberGeneratorEntity;
        return $numberGeneratorEntity::get($id);
    }
}
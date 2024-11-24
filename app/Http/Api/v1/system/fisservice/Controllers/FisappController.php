<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FisappEntity;



class FisappController extends Controller{
    
    function index(Request $request){
        $fisappEntity = new FisappEntity;
        return $fisappEntity::get($request->all());
    }

    function store(Request $request){
        $fisappEntity = new FisappEntity;
        return $fisappEntity::set($request->all());
    }

    function show($id){
        $fisappEntity = new FisappEntity;
        return $fisappEntity::get($id);
    }
}
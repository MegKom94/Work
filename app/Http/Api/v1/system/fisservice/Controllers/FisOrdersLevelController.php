<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FisOrdersLevelEntity;



class FisOrdersLevelController extends Controller{
    
    function index(Request $request){
        $FisOrdersLevelEntity = new FisOrdersLevelEntity;
        return $FisOrdersLevelEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $FisOrdersLevelEntity = new FisOrdersLevelEntity;
            return  $FisOrdersLevelEntity::get($request->all());
        }
        elseif($request->input('method') == 'POST'){
            $FisOrdersLevelEntity = new FisOrdersLevelEntity;
            return  $FisOrdersLevelEntity::set($request->all());
        }
        else return 'WITHOUT METHOD';
    }

    function show($id){
        $FisOrdersLevelEntity = new FisOrdersLevelEntity;
        return $FisOrdersLevelEntity::get($id);
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\ContractsEntity;



class ContractsController extends Controller{
    
    function index(Request $request){
        $contractsEntity = new ContractsEntity;
        return $contractsEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $contractsEntity = new ContractsEntity;
            return $contractsEntity::get($request->all());
        }
        else{
            $contractsEntity = new ContractsEntity;
            return $contractsEntity::set($request->all());
        }
    }

    function show($id){
        $contractsEntity = new ContractsEntity;
        return $contractsEntity::get($id);
    }
}
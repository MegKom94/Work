<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FisExecFromDocProtectedEntity;



class FisExecFromDocProtectedController extends Controller{
    
    function index(Request $request){
        $FisExecFromDocProtectedEntity = new FisExecFromDocProtectedEntity;
        return $FisExecFromDocProtectedEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $FisExecFromDocProtectedEntity = new FisExecFromDocProtectedEntity;
            return  $FisExecFromDocProtectedEntity::get($request->all());
        }
        elseif('POST'){
            $FisExecFromDocProtectedEntity = new FisExecFromDocProtectedEntity;
            return  $FisExecFromDocProtectedEntity::set($request->all());
        }
        else return 'WITHOUT METHOD';
    }

    function show($id){
        $FisExecFromDocProtectedEntity = new FisExecFromDocProtectedEntity;
        return $FisExecFromDocProtectedEntity::get($id);
    }
}
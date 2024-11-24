<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\UpdateProtectedEntity;



class UpdateProtectedController extends Controller{
    
    function index(Request $request){
        $updateProtectedEntity = new UpdateProtectedEntity;
        return $updateProtectedEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $updateProtectedEntity = new UpdateProtectedEntity;
            return $updateProtectedEntity::get($request->all());
        }
        else{
            $updateProtectedEntity = new UpdateProtectedEntity;
            return $updateProtectedEntity::set($request->all());
        }
    }

    function show($id){
        $updateProtectedEntity = new UpdateProtectedEntity;
        return $updateProtectedEntity::get($id);
    }
}
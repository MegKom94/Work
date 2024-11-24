<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\ConfirmedAppEntity;



class ConfirmedAppController extends Controller{
    
    function index(Request $request){
        $confirmedAppEntity = new ConfirmedAppEntity;
        return $confirmedAppEntity::get($request->all(), type: '');
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $confirmedAppEntity = new ConfirmedAppEntity;
            return $confirmedAppEntity::get($request->all());
        }
        else{
            $confirmedAppEntity = new ConfirmedAppEntity;
            return $confirmedAppEntity::set($request->all());
        }
    }

    function show($id){
        $confirmedAppEntity = new ConfirmedAppEntity;
        return $confirmedAppEntity::get($id);
    }
}
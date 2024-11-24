<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FisAbtEgeStatusEntity;



class FisAbtEgeStatusController extends Controller{
    
    function index(Request $request){
        $FisAbtEgeStatusEntity = new FisAbtEgeStatusEntity;
        return $FisAbtEgeStatusEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $FisAbtEgeStatusEntity = new FisAbtEgeStatusEntity;
            return  $FisAbtEgeStatusEntity::get($request->all());
        }
        elseif('POST'){
            $FisAbtEgeStatusEntity = new FisAbtEgeStatusEntity;
            return  $FisAbtEgeStatusEntity::set($request->all());
        }
        else return 'WITHOUT METHOD';
    }

    function show($id){
        $FisAbtEgeStatusEntity = new FisAbtEgeStatusEntity;
        return $FisAbtEgeStatusEntity::get($id);
    }
}
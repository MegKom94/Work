<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FisMarksEntity;



class FisMarksController extends Controller{
    
    function index(Request $request){
        $FisMarksEntity = new FisMarksEntity;
        return $FisMarksEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $FisMarksEntity = new FisMarksEntity;
            return  $FisMarksEntity::get($request->all());
        }
        elseif('POST'){
            $FisMarksEntity = new FisMarksEntity;
            return  $FisMarksEntity::set($request->all());
        }
        else return 'WITHOUT METHOD';
    }

    function show($id){
        $FisMarksEntity = new FisMarksEntity;
        return $FisMarksEntity::get($id);
    }
}
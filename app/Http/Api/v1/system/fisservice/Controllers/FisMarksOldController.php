<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\FisMarksOldEntity;



class FisMarksOldController extends Controller{
    
    function index(Request $request){
        $FisMarksOldEntity = new FisMarksOldEntity;
        return $FisMarksOldEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $FisMarksOldEntity = new FisMarksOldEntity;
            return  $FisMarksOldEntity::get($request->all());
        }
        elseif('POST'){
            $FisMarksOldEntity = new FisMarksOldEntity;
            return  $FisMarksOldEntity::set($request->all());
        }
        else return 'WITHOUT METHOD';
    }

    function show($id){
        $FisMarksOldEntity = new FisMarksOldEntity;
        return $FisMarksOldEntity::get($id);
    }
}
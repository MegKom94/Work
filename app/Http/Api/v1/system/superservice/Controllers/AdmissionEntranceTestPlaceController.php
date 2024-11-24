<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\AdmissionEntranceTestPlaceEntity;



class AdmissionEntranceTestPlaceController extends Controller{
    
    function index(Request $request){
        $admissionEntranceTestPlaceEntity = new AdmissionEntranceTestPlaceEntity;
        return $admissionEntranceTestPlaceEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $admissionEntranceTestPlaceEntity = new AdmissionEntranceTestPlaceEntity;
            return $admissionEntranceTestPlaceEntity::get($request->all(), type: '');
        }
        else{
            $admissionEntranceTestPlaceEntity = new AdmissionEntranceTestPlaceEntity;
            return $admissionEntranceTestPlaceEntity::set($request->all());
        }
    }

    function show($id){
        $admissionEntranceTestPlaceEntity = new AdmissionEntranceTestPlaceEntity;
        return $admissionEntranceTestPlaceEntity::get($id);
    }
}
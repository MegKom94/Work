<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\AdmissioncontrolnumbersEntity;



class AdmissioncontrolnumbersController extends Controller{
    
    function index(Request $request){
        $admissioncontrolnumbersEntity = new AdmissioncontrolnumbersEntity;
        return $admissioncontrolnumbersEntity::get($request->all(), type: '');
    }

    function store(Request $request){
        $admissioncontrolnumbersEntity = new AdmissioncontrolnumbersEntity;
        return $admissioncontrolnumbersEntity::set($request->all());
    }

    function show($id){
        $admissioncontrolnumbersEntity = new AdmissioncontrolnumbersEntity;
        return $admissioncontrolnumbersEntity::get($id);
    }
}
<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\AdmissioninfoEntity;



class AdmissioninfoController extends Controller{
    
    function index(Request $request){
        $admissioninfoEntity = new AdmissioninfoEntity;
        return $admissioninfoEntity::get($request->all());
    }

    function store(Request $request){
        $admissioninfoEntity = new AdmissioninfoEntity;
        return $admissioninfoEntity::set($request->all());
    }

    function show($id){
        $admissioninfoEntity = new AdmissioninfoEntity;
        return $admissioninfoEntity::get($id);
    }
}
<?php
namespace App\Http\Api\v1\system\fisservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\fisservice\Entities\InstitutionprogramsEntity;



class InstitutionprogramsController extends Controller{
    
    function index(Request $request){
        $institutionprogramsEntity = new InstitutionprogramsEntity;
        return $institutionprogramsEntity::get($request->all());
    }

    function store(Request $request){
        $institutionprogramsEntity = new InstitutionprogramsEntity;
        return $institutionprogramsEntity::set($request->all());
    }

    function show($id){
        $institutionprogramsEntity = new InstitutionprogramsEntity;
        return $institutionprogramsEntity::get($id);
    }
}
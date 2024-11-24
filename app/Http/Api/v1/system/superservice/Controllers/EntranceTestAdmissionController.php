<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\EntranceTestAdmissionEntity;


class EntranceTestAdmissionController extends Controller{
    
    function index(Request $request){
        $entranceTestAdmissionEntity = new EntranceTestAdmissionEntity;
        return  $entranceTestAdmissionEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $entranceTestAdmissionEntity = new EntranceTestAdmissionEntity;
            return  $entranceTestAdmissionEntity::get($request->all(), type: 'raw');
        }
        elseif('POST'){
            $entranceTestAdmissionEntity = new EntranceTestAdmissionEntity;
            return  $entranceTestAdmissionEntity::set($request->all());
        }
        else return 'WITHOUT METHOD';
    }

    function show($id){
        $entranceTestAdmissionEntity = new EntranceTestAdmissionEntity;
        return  $entranceTestAdmissionEntity::get($id);
    }
}
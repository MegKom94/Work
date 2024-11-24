<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\GuideEntity;


class GuideController extends Controller{
    
    function index(Request $request){
        $guideEntity = new GuideEntity;
        return  $guideEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $guideEntity = new GuideEntity;
            return  $guideEntity::get($request->all(), type: 'raw');
        }
        elseif('POST'){
            $guideEntity = new GuideEntity;
            return  $guideEntity::set($request->all());
        }
        else return 'WITHOUT METHOD';
    }

    function show($id){
        $guideEntity = new GuideEntity;
        return  $guideEntity::get($id);
    }
}
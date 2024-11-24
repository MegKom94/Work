<?php
namespace App\Http\Api\v1\system\forms\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\forms\Entities\FormsEntity;



class FormsController extends Controller{
    
    function index(Request $request){
        $formsEntity = new FormsEntity;
        return $formsEntity::get($request->all());
    }

    function store(Request $request){
        $formsEntity = new FormsEntity;
        return $formsEntity::set($request->all());
    }

    function show($id){
        $formsEntity = new FormsEntity;
        return $formsEntity::get($id);
    }
}
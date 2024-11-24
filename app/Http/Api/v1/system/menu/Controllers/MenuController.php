<?php
namespace App\Http\Api\v1\system\menu\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\menu\Entities\MenuEntity;



class MenuController extends Controller{
    
    function index(Request $request){
        $menuEntity = new MenuEntity;
        return $menuEntity::get($request->all());
    }

    function store(Request $request){
        $menuEntity = new MenuEntity;
        return $menuEntity::set($request->all());
    }

    function show($id){
        $menuEntity = new MenuEntity;
        return $menuEntity::get($id);
    }
}
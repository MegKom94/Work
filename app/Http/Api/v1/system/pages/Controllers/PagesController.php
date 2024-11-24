<?php
namespace App\Http\Api\v1\system\pages\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\pages\Entities\PagesEntity;



class PagesController extends Controller{
    
    function index(Request $request){
        $pagesEntity = new PagesEntity;
        return $pagesEntity::get($request->all());
    }

    function store(Request $request){
        $pagesEntity = new PagesEntity;
        return $pagesEntity::set($request->all());
    }

    function show($id){
        $pagesEntity = new PagesEntity;
        return $pagesEntity::get($id);
    }
}
<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\CountlogsEntity;



class CountlogsController extends Controller{
    
    function index(Request $request){
        $countlogsEntity = new CountlogsEntity;
        return $countlogsEntity::get($request->all());
    }

    function store(Request $request){
        $countlogsEntity = new CountlogsEntity;
        return $countlogsEntity::set($request->all());
    }

    function show($id){
        $countlogsEntity = new CountlogsEntity;
        return $countlogsEntity::get($id);
    }
}
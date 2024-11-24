<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\LogsEntity;


class LogsController extends Controller{
    
    function index(Request $request){
        $logsEntity = new LogsEntity;
        return $logsEntity::get($request->all());
    }

    function store(Request $request){
        $logsEntity = new LogsEntity;
        return $logsEntity::set($request->all());
    }

    function show($id){
        $logsEntity = new LogsEntity;
        return $logsEntity::get($id);
    }
}
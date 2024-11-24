<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\DocsForChangeEntity;



class DocsForChangeController extends Controller{
    
    function index(Request $request){
        $docsForChangeEntity = new DocsForChangeEntity;
        return $docsForChangeEntity::get($request->all(), type: '');
    }

    function store(Request $request){
        $docsForChangeEntity = new DocsForChangeEntity;
        return $docsForChangeEntity::set($request->all());
    }

    function show($id){
        $docsForChangeEntity = new DocsForChangeEntity;
        return $docsForChangeEntity::get($id);
    }
}
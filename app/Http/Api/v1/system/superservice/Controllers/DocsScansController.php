<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\DocsScansEntity;


class DocsScansController extends Controller{
    
    function index(Request $request){
        $docsScansEntity = new DocsScansEntity;
        return  $docsScansEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $docsScansEntity = new DocsScansEntity;
            return  $docsScansEntity::get($request->all(), type: '');
        }
        elseif('POST'){
            $docsScansEntity = new DocsScansEntity;
            return  $docsScansEntity::set($request->all());
        }
        else return 'WITHOUT METHOD';
    }

    function show($id){
        $docsScansEntity = new DocsScansEntity;
        return  $docsScansEntity::get($id);
    }
}
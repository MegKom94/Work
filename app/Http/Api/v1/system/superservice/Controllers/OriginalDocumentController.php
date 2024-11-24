<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\OriginalDocumentEntity;



class OriginalDocumentController extends Controller{
    
    function index(Request $request){
        $originalDocumentEntity = new OriginalDocumentEntity;
        return $originalDocumentEntity::get($request->all(),  type: '');
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $originalDocumentEntity = new OriginalDocumentEntity;
            return $originalDocumentEntity::get($request->all(), type: '');
        }
        else{
            $originalDocumentEntity = new OriginalDocumentEntity;
            return $originalDocumentEntity::set($request->all());
        }
    }

    function show($id){
        $originalDocumentEntity = new OriginalDocumentEntity;
        return $originalDocumentEntity::get($id);
    }
}
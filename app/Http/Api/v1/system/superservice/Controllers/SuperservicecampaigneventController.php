<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\SuperservicecampaigneventEntity;



class SuperservicecampaigneventController extends Controller{
    function store(Request $request){
        if($request->input('method') == 'GET'){
            $superservicecampaigneventEntity = new SuperservicecampaigneventEntity;
            return $superservicecampaigneventEntity::get($request->all());
        }
        else{
            $superservicecampaigneventEntity = new SuperservicecampaigneventEntity;
            return $superservicecampaigneventEntity::set($request->all());
        }
    }

    function show($id){
        $superservicecampaigneventEntity = new SuperservicecampaigneventEntity;
        return $superservicecampaigneventEntity::get($id);
    }
}
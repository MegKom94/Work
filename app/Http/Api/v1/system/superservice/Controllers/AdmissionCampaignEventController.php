<?php
namespace App\Http\Api\v1\system\superservice\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Http\Api\v1\system\superservice\Entities\AdmissionCampaignEventEntity;



class AdmissionCampaignEventController extends Controller{
    
    function index(Request $request){
        $admissionCampaignEventEntity = new AdmissionCampaignEventEntity;
        return $admissionCampaignEventEntity::get($request->all());
    }

    function store(Request $request){
        if($request->input('method') == 'GET'){
            $admissionCampaignEventEntity = new AdmissionCampaignEventEntity;
            return $admissionCampaignEventEntity::get($request->all());
        }
        else{
            $admissionCampaignEventEntity = new AdmissionCampaignEventEntity;
            return $admissionCampaignEventEntity::set($request->all());
        }
    }

    function show($id){
        $admissionCampaignEventEntity = new AdmissionCampaignEventEntity;
        return $admissionCampaignEventEntity::get($id);
    }
}
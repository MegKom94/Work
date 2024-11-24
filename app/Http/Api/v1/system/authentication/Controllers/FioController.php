<?php
namespace App\Http\Api\v1\system\authentication\Controllers;

use App\Http\Api\v1\system\authentication\Resources\AuthenticationFioResource;
use Illuminate\Http\Request;
use App\Http\sources\Controller;
use App\Models\User;

class FioController extends Controller{

    function store(Request $request){
        $id_user = ($request->input('id_user') !== NULL ? $request->input('id_user') : session('id_user'));
        
        $user = User::findOrFail($id_user)->toArray();
        
        return [
            'lastname'=>$user['lastname'],
            'firstname'=>$user['firstname'],
            'secondname'=>$user['secondname'],
            'image'=>$user['image'],
        ];
    }
}
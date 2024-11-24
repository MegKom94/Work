<?php
namespace App\Http\Api\v1\system\authentication\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use Illuminate\Support\Facades\Http;
use App\Exceptions\Token;

class AuthenticationController extends Controller{

    function store(Request $request){

        $response = Http::asForm()->post("http://172.16.170.109/token/auth", [
            'login' => $request->input('login'),
            'password' => $request->input('password'),
            'platform'=> $request->input('platform'),
            'remote_ip'=>$request->ip(),
        ]);

        $status = $response->status();
        $response = json_decode($response, true);

        if($status == 200) return response($response)->withHeaders(['Access-Control-Allow-Credentials'=>'true']);
        else throw new Token($response["Error"], $status);
    }
}
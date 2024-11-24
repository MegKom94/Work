<?php
namespace App\Http\Api\v1\system\authentication\Controllers;

use Illuminate\Http\Request;
use App\Http\sources\Controller;
use Illuminate\Support\Facades\Http;
use App\Exceptions\Token;

class RefreshController extends Controller{

    function store(Request $request){

        $response = Http::asForm()->post("http://172.16.170.109/token/refresh", [
            'a_token' => $request->input('a_token'),
            'r_token' => $request->input('r_token'),
            'platform'=> $request->input('platform'),
            'remote_ip'=>$request->ip(),
        ]);

        $status = $response->status();
        $response = json_decode($response, true);

        if($status == 200) return response($response)->withHeaders(['Access-Control-Allow-Credentials'=>'true']);
        else  throw new Token($response["Error"], $status);
    }
}
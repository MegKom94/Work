<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Exceptions\Token;
use Illuminate\Support\Facades\Http;
use App\Http\sources\Mixin; 

class AuthenticateApi extends Middleware{
    use Mixin;
    
    protected function authenticate($request, array $guards){
        $exceptions = [
            stripos($request->url(), 'menu'),
            stripos($request->url(), 'authentication/authentication'),
            stripos($request->url(), 'authentication/check'),
            stripos($request->url(), 'authentication/refresh'),
            stripos($request->url(), 'authentication/logout'),
            in_array($request->ip(), ['172.16.170.49', '82.179.90.10', '82.179.90.9', '172.16.170.9', '82.179.90.9']),
            stripos($request->url(), 'authentication/fio') && in_array($request->ip(), ['172.16.86.13']),
            stripos($request->url(), 'authentication/fio') && in_array($request->ip(), ['172.16.86.11']),
        ];

        $token = $request->bearerToken();//Authorization:Bearer wewf-wfwvw-3-d-3d3d3
       

        session(['right'=>'adm']);
        
        if($request->ip() == '172.16.170.49'){
            session(['id_user'=>'517671772']); 
            session(['right'=>'adm']); 
        }

        foreach($exceptions as $exception) if($exception) return;
      
        if(!isset($token)) throw new Token('Token is missing', 401);

        $response = Http::asForm()->post("http://172.16.170.109/token/check", [
            'a_token' => $token,
            'remote_ip'=>$request->ip(),
        ]);
        
        $status = $response->status();
        $response = json_decode($response, true);
        
        if($status == 200){
            session(['id_user'=>$response['sub']]); 
            return;
        }
        else{
            throw new Token($response["Error"], $status);
        }
    }
}
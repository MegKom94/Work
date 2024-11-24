<?php

namespace App\Exceptions;
use Illuminate\Http\Request;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Http\sources\Wrapper;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void{
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (Throwable $throwable, Request $request) {
            if(stripos($request->ip(), '172.16.170.') !== false || stripos($request->ip(), '172.16.86.') !== false){
                $statusCode = method_exists($throwable, 'getStatusCode') ? $throwable->getStatusCode() : 500;
            
                return Wrapper::_response([
                    'Message'=>$throwable->getMessage(),
                    'Info'=>[
                        // 'trace'=>$throwable->getTrace(),
                        'line'=>$throwable->getLine(),
                        'file'=>$throwable->getFile(),
                    ]
                ], $statusCode);
            }
            elseif(stripos($request->ip(), '172.16.70.4') !== false || stripos($request->ip(), '172.16.70.5') !== false || stripos($request->ip(), '82.179.90.3') !== false){
                return response(['status'=>'work'])->setStatusCode(200);
            }

            return response('  ')->setStatusCode(500);
        });
    }
}

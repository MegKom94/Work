<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(1000)->by($request->user()->id ?: $request->ip());
        });
        
        
        $this->routes(function () {            
            $routes = [
                Route::middleware('api')->prefix('test/api')->group(base_path('routes/api.php')),
                Route::middleware('api')->prefix('prod/api')->group(base_path('routes/api.php')),
                Route::middleware('api')->prefix('mdl/api')->group(base_path('routes/api.php')),
                Route::middleware('api')->prefix('new/api')->group(base_path('routes/api.php')),
            ];

            $versions = scandir(base_path('app/Http/Api/'));
            for($i = 2; $i < count($versions); $i++){
                $version = $versions[$i];
                $systems = scandir(base_path("app/Http/Api/{$version}/system/"));

                for($j = 2; $j < count($systems); $j++){
                    $system = $systems[$j];
                    $path = base_path("app/Http/Api/{$version}/system/{$system}/Routes/api.php");
                    if(!file_exists($path)) continue;

                    array_push($routes,  
                        Route::middleware('api')->prefix("test/api/{$version}/{$system}/")->group($path),
                        Route::middleware('api')->prefix("prod/api/{$version}/{$system}/")->group($path),
                        Route::middleware('api')->prefix("mdl/api/{$version}/{$system}/")->group($path)
                    );
                }
            }  

            return $routes;
        });
    }
}

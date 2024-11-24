<?php 
use App\Http\Api\v1\system\authentication\Controllers\FioController;
use App\Http\Api\v1\system\authentication\Controllers\LogoutController;
use App\Http\Api\v1\system\authentication\Controllers\RefreshController;
use App\Http\Api\v1\system\authentication\Controllers\CheckController;
use App\Http\Api\v1\system\authentication\Controllers\AuthenticationController;

use Illuminate\Support\Facades\Route;

Route::apiResources(['authentication'=>AuthenticationController::class]);

Route::apiResources(['check'=>CheckController::class]);

Route::apiResources(['refresh'=>RefreshController::class]);

Route::apiResources(['logout'=>LogoutController::class]);

Route::apiResources(['fio'=>FioController::class]);
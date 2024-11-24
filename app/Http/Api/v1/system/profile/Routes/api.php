<?php 
use App\Http\Api\v1\system\profile\Controllers\InfoController;
use App\Http\Api\v1\system\profile\Controllers\ExecutionController;

use Illuminate\Support\Facades\Route;

Route::apiResources([
    'info'=>InfoController::class,
]);

Route::apiResources([
    'exec'=>ExecutionController::class,
]);
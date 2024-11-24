<?php
use App\Http\Api\v1\system\admin\Controllers\ModelsController;
use App\Http\Api\v1\system\admin\Controllers\RightsController;
use App\Http\Api\v1\system\admin\Controllers\SystemsController;
use App\Http\Api\v1\system\admin\Controllers\EntitiesController;
use Illuminate\Support\Facades\Route;



Route::apiResources([
    'rights'=>RightsController::class,
]);

Route::apiResources([
    'entities'=>EntitiesController::class,
]);

Route::apiResources([
    'systems'=>SystemsController::class,
]);

Route::apiResources([
    'models'=>ModelsController::class,
]);

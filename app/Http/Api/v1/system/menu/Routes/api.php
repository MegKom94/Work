<?php
use App\Http\Api\v1\system\menu\Controllers\MenuController;

use Illuminate\Support\Facades\Route;

Route::apiResources(['menu'=>MenuController::class]);

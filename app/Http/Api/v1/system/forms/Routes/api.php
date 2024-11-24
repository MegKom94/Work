<?php
use App\Http\Api\v1\system\forms\Controllers\FormsController;

use Illuminate\Support\Facades\Route;

Route::apiResources(['forms'=>FormsController::class]);
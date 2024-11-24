<?php

use App\Http\Api\v1\system\scosservice\Controllers\ScosusermarksController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosuserinfoController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosstudyplansdisciplinescountController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosstudyplansstudentscountController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosmarkscountController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosstudentscountController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosdisciplinescountController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosstudyplanscountController;
use App\Http\Api\v1\system\scosservice\Controllers\ScoseducationalprogramscountController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosstudyplansdisciplinesController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosstudyplansstudentsController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosmarksController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosstudentsController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosdisciplinesController;
use App\Http\Api\v1\system\scosservice\Controllers\ScosstudyplansController;
use App\Http\Api\v1\system\scosservice\Controllers\ScoseducationalprogramsController;
use Illuminate\Support\Facades\Route;


Route::apiResources([
    'scoseducationalprograms'=>ScoseducationalprogramsController::class,
]);

Route::apiResources([
    'scosstudyplans'=>ScosstudyplansController::class,
]);

Route::apiResources([
    'scosdisciplines'=>ScosdisciplinesController::class,
]);

Route::apiResources([
    'scosstudents'=>ScosstudentsController::class,
]);

Route::apiResources([
    'scosmarks'=>ScosmarksController::class,
]);

Route::apiResources([
    'scosstudyplansstudents'=>ScosstudyplansstudentsController::class,
]);

Route::apiResources([
    'scosstudyplansdisciplines'=>ScosstudyplansdisciplinesController::class,
]);

Route::apiResources([
    'scoseducationalprogramscount'=>ScoseducationalprogramscountController::class,
]);

Route::apiResources([
    'scosstudyplanscount'=>ScosstudyplanscountController::class,
]);

Route::apiResources([
    'scosdisciplinescount'=>ScosdisciplinescountController::class,
]);

Route::apiResources([
    'scosstudentscount'=>ScosstudentscountController::class,
]);

Route::apiResources([
    'scosmarkscount'=>ScosmarkscountController::class,
]);

Route::apiResources([
    'scosstudyplansstudentscount'=>ScosstudyplansstudentscountController::class,
]);

Route::apiResources([
    'scosstudyplansdisciplinescount'=>ScosstudyplansdisciplinescountController::class,
]);

Route::apiResources([
    'scosuserinfo'=>ScosuserinfoController::class,
]);

Route::apiResources([
    'scosusermarks'=>ScosusermarksController::class,
]);
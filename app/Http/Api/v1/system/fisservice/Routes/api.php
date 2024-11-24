<?php 

use App\Http\Api\v1\system\fisservice\Controllers\FisOrdersLevelController;
use App\Http\Api\v1\system\fisservice\Controllers\FisEgeByDepartmentRAWController;
use App\Http\Api\v1\system\fisservice\Controllers\FisEgeStatusByIDUserController;
use App\Http\Api\v1\system\fisservice\Controllers\FisEgeByDepartmentController;
use App\Http\Api\v1\system\fisservice\Controllers\FisMarksOldController;
use App\Http\Api\v1\system\fisservice\Controllers\FisAppWithOrdersController; 
use App\Http\Api\v1\system\fisservice\Controllers\FisOrdersController; 
use App\Http\Api\v1\system\fisservice\Controllers\FisAbtEgeStatusController;
use App\Http\Api\v1\system\fisservice\Controllers\FisExecFromDocProtectedController;
use App\Http\Api\v1\system\fisservice\Controllers\FisEgeSubjectsController;
use App\Http\Api\v1\system\fisservice\Controllers\FisMarksController;
use App\Http\Api\v1\system\fisservice\Controllers\FisAppForEgeResultsController;
use App\Http\Api\v1\system\fisservice\Controllers\FisinstitutionachievementsController;
use App\Http\Api\v1\system\fisservice\Controllers\FistargetorgsController;
use App\Http\Api\v1\system\fisservice\Controllers\InstitutionprogramsController;
use App\Http\Api\v1\system\fisservice\Controllers\FiscompetitiongroupsController;
use App\Http\Api\v1\system\fisservice\Controllers\FisLogsController;
use App\Http\Api\v1\system\fisservice\Controllers\AdmissioninfoController;
use App\Http\Api\v1\system\fisservice\Controllers\FisappController;
use Illuminate\Support\Facades\Route;

Route::apiResources([
    'fisapp'=>FisappController::class,
]);

Route::apiResources([
    'admissioninfo'=>AdmissioninfoController::class,
]);

Route::apiResources([
    'fislogs'=>FisLogsController::class,
]);

Route::apiResources([
    'fiscompetitiongroups'=>FiscompetitiongroupsController::class,
]);

Route::apiResources([
    'institutionprograms'=>InstitutionprogramsController::class,
]);

Route::apiResources([
    'fistargetorgs'=>FistargetorgsController::class,
]);

Route::apiResources([
    'fisinstitutionachievements'=>FisinstitutionachievementsController::class,
]);

Route::apiResources([
    'FisAppForEgeResults'=>FisAppForEgeResultsController::class,
]);

Route::apiResources([
    'FisMarks'=>FisMarksController::class,
]);

Route::apiResources([
    'FisEgeSubjects'=>FisEgeSubjectsController::class,
]);

Route::apiResources([
    'FisExecFromDocProtected'=>FisExecFromDocProtectedController::class,
]);

Route::apiResources([
    'FisAbtEgeStatus'=>FisAbtEgeStatusController::class,
]);

Route::apiResources([
    'FisOrders'=>FisOrdersController::class,
]);

Route::apiResources([
    'FisAppWithOrders'=>FisAppWithOrdersController::class,
]);

Route::apiResources([
    'FisMarksOld'=>FisMarksOldController::class,
]);

Route::apiResources([
    'FisEgeByDepartment'=>FisEgeByDepartmentController::class,
]);

Route::apiResources([
    'FisEgeByIDUser'=>FisEgeStatusByIDUserController::class,
]);

Route::apiResources([
    'FisEgeByDepartmentRAW'=>FisEgeByDepartmentRAWController::class,
]);

Route::apiResources([
    'FisOrdersLevel'=>FisOrdersLevelController::class,
]);
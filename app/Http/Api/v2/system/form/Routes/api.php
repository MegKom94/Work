<?php
use App\Models\App;
use App\Http\Api\v2\system\example\Controllers\AppController;
use App\Http\Api\v2\system\FormType\Controllers\FormTypeController;
use Illuminate\Support\Facades\Route;

Route::api('/del',FormTypeController::class);
Route::api('/',[FormTypeController::class,'list']);
// Route::api('/create',[FormTypeController::class,'create']);
// Route::api('/{form_type}',[FormTypeController::class,'get']);
// Route::api('/{form_type}/edit',[FormTypeController::class,'edit']);
// Route::api('/{form_type_id}/statistics',[FormTypeController::class,'statistics']);
// Route::api('/{form_type}/list_questions',[FormTypeController::class,'listQuestions']);
// Route::api('/{form_type}/delete',[FormTypeController::class,'delete'])->withTrashed();

<?php 

use App\Http\Api\v1\system\superservice\Controllers\ContractsController;
use App\Http\Api\v1\system\superservice\Controllers\MarksOldController;
use App\Http\Api\v1\system\superservice\Controllers\ConfirmedAppController;
use App\Http\Api\v1\system\superservice\Controllers\AppForTableController;
use App\Http\Api\v1\system\superservice\Controllers\SimpleAppController;
use App\Http\Api\v1\system\superservice\Controllers\DocsScansController;
use App\Http\Api\v1\system\superservice\Controllers\AppForChangeOurController;
use App\Http\Api\v1\system\superservice\Controllers\OriginalDocumentController;
use App\Http\Api\v1\system\superservice\Controllers\DocsForChangeController;
use App\Http\Api\v1\system\superservice\Controllers\MarksForChangeController;   
use App\Http\Api\v1\system\superservice\Controllers\SchoolsController;
use App\Http\Api\v1\system\superservice\Controllers\AppForChangeController;
use App\Http\Api\v1\system\superservice\Controllers\UpdateProtectedController;
use App\Http\Api\v1\system\superservice\Controllers\CompetitionsGroupsController;
use App\Http\Api\v1\system\superservice\Controllers\UserInfoController;
use App\Http\Api\v1\system\superservice\Controllers\NumberGeneratorController;
use App\Http\Api\v1\system\superservice\Controllers\GuideController;
use App\Http\Api\v1\system\superservice\Controllers\AdmissionEntranceTestPlaceController;
use App\Http\Api\v1\system\superservice\Controllers\AdmissionCampaignEventController;
use App\Http\Api\v1\system\superservice\Controllers\EntranceTestAdmissionController;
use App\Http\Api\v1\system\superservice\Controllers\SuperservicecampaigneventController;
use App\Http\Api\v1\system\superservice\Controllers\SuperservicetargetorgsController;
use App\Http\Api\v1\system\superservice\Controllers\CompetitionsController;
use App\Http\Api\v1\system\superservice\Controllers\AdmissioncontrolnumbersController;
use App\Http\Api\v1\system\superservice\Controllers\ProfilesclsController;
use App\Http\Api\v1\system\superservice\Controllers\CountlogsController;
use App\Http\Api\v1\system\superservice\Controllers\CountController;
use App\Http\Api\v1\system\superservice\Controllers\ConfigController;
use App\Http\Api\v1\system\superservice\Controllers\AppController;
use App\Http\Api\v1\system\superservice\Controllers\LogsController;
use Illuminate\Support\Facades\Route;

Route::apiResources(['app'=>AppController::class]);

Route::apiResources(['logs'=>LogsController::class]);

Route::apiResources(['config'=>ConfigController::class]);

Route::apiResources(['count'=>CountController::class]);

Route::apiResources(['countlogs'=>CountlogsController::class]);

Route::apiResources(['profilescls'=>ProfilesclsController::class]);

Route::apiResources(['admissioncontrolnumbers'=>AdmissioncontrolnumbersController::class]);

Route::apiResources(['competitions'=>CompetitionsController::class]);

Route::apiResources(['superservicetargetorgs'=>SuperservicetargetorgsController::class]);

Route::apiResources(['superservicecampaignevent'=>SuperservicecampaigneventController::class]);

Route::apiResources(['entrancetestadmission'=>EntranceTestAdmissionController::class]);

Route::apiResources(['admissioncampaignevent'=>AdmissionCampaignEventController::class]);

Route::apiResources(['admissionentrancetestplace'=>AdmissionEntranceTestPlaceController::class]);

Route::apiResources(['guide'=>GuideController::class]);

Route::apiResources(['numbergenerator'=>NumberGeneratorController::class]);

Route::apiResources(['userinfo'=>UserInfoController::class]);

Route::apiResources(['competitionsgroups'=>CompetitionsGroupsController::class]);

Route::apiResources(['updateprotected'=>UpdateProtectedController::class]);

Route::apiResources(['appforchange'=>AppForChangeController::class]);

Route::apiResources(['schools'=>SchoolsController::class]);

Route::apiResources(['marksforchange'=>MarksForChangeController::class]);

Route::apiResources(['docsforchange'=>DocsForChangeController::class]);

Route::apiResources(['originaldocument'=>OriginalDocumentController::class]);

Route::apiResources(['appforchangeour'=>AppForChangeOurController::class]);

Route::apiResources(['docsscans'=>DocsScansController::class]);

Route::apiResources(['simpleapp'=>SimpleAppController::class]);

Route::apiResources(['appfortable'=>AppForTableController::class]);

Route::apiResources(['confirmedapp'=>ConfirmedAppController::class]);

Route::apiResources(['marksold'=>MarksOldController::class]);

Route::apiResources(['contracts'=>ContractsController::class]);
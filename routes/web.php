<?php
use App\Exports\StudentExport;
use App\Exports\GroupExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SupervisorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/change/password',[AuthController::class,'loadChangePasswordGeneral']);
Route::post('/change/password/general',[AuthController::class,'ChangePasswordGeneral'])->name('ChangePasswordGeneral');
Route::get('/register-admin',[CoordinatorController::class,'loadRegisterCoord']);
Route::post('/register-admin',[CoordinatorController::class,'RegisterCoord'])->name('RegisterCoord');
Route::get('/login',[AuthController::class,'loadLogin']);
Route::post('/login-user',[AuthController::class,'LoginUser'])->name('LoginUser');
Route::get('/logout',[AuthController::class,'logout']);
//loading dashboards
Route::get('/forgot-password',[AuthController::class,'loadforgot']);
Route::post('/forgot-password',[AuthController::class,'forgot'])->name('forgot-password');
//password Reset
Route::get('/reset-password',[AuthController::class,'resetpasswordLoad']);
Route::post('/resetting',[AuthController::class,'ResetPassword'])->name('ResetPassword');
//middleware routes
Route::group(['middleware' => ['web','checkCoordinator']],function(){
    Route::get('/coordinator/dashboard',[CoordinatorController::class,'loadCoordiDashboard']);
    Route::get('/profile',[CoordinatorController::class,'loadCoordiProfile']);
    Route::post('/coordinator/photo/upload',[CoordinatorController::class,'uploadPhoto'])->name('uploadPhoto');
    Route::post('/coordinator/update/profile',[CoordinatorController::class,'ChangeProfileData'])->name('ChangeProfileData');
    Route::post('/coordinator/change/password',[CoordinatorController::class,'changePassword'])->name('changePassword');
//supervisor
    Route::get('/coordinator/manage/supervisors',[CoordinatorController::class,'loadSupervisor']);
    Route::get('/register/supervisors',[CoordinatorController::class,'loadSupervisorForm']);
    Route::post('/register/supervisor',[CoordinatorController::class,'RegisterSupervisor'])->name('RegisterSupervisor');
    Route::get('/edit/supervisor/{id}',[CoordinatorController::class,'loadSupervisorEditForm'])->name('loadSupervisorEditForm');
    Route::post('/edit/supervisor',[CoordinatorController::class,'EditSupervisor'])->name('EditSupervisor');
    Route::get('/delete/supervisor/{id}/{email}',[CoordinatorController::class,'deleteSupervisor'])->name('deleteSupervisor');
    //student routes
    Route::get('/coordinator/manage/students',[CoordinatorController::class,'loadStudent']);
    Route::get('/register/students',[CoordinatorController::class,'loadStudentForm']);
    Route::post('/register/students',[CoordinatorController::class,'studentRegister'])->name('studentRegister');
    Route::get('/edit/students/{id}',[CoordinatorController::class,'loadStudentEditForm'])->name('loadStudentEditForm');
    Route::post('/edit/student',[CoordinatorController::class,'EditStudent'])->name('EditStudent');
    Route::get('/delete/students/{id}/{regno}',[CoordinatorController::class,'deleteStudent'])->name('deleteStudent');
    //title management routes
    Route::get('/student/titles',[CoordinatorController::class,'loadProjectTitles']);
    Route::get('/accept/title',[CoordinatorController::class,'AcceptTitle'])->name('AcceptTitle');
    Route::get('/reject/title',[CoordinatorController::class,'RejectTitle'])->name('RejectTitle');
    Route::get('/rejected/title/{group_id}',[CoordinatorController::class,'RejectedTitle']);
    Route::get('/add/remark/{id}',[CoordinatorController::class,'loadAddRemark']);
    Route::post('/add/remark',[CoordinatorController::class,'AddRemark'])->name('AddRemark');
    //groups
    Route::get('/group/detail',[CoordinatorController::class,'loadGroups']);
    Route::get('/group/size',[CoordinatorController::class,'loadGroupsSize']);
    Route::get('/group/supervisor/detail',[CoordinatorController::class,'loadGroupsSupervisor']);
    Route::get('/assign/supervisor',[CoordinatorController::class,'loadAssignSupervisorForm']);
    Route::get('/un-assign/supervisor/{id}',[CoordinatorController::class,'UnassignSupervisor']);
    Route::post('/assign/supervisor',[CoordinatorController::class,'AssignSupervisor'])->name('AssignSupervisor');
    Route::get('/register/group/size',[CoordinatorController::class,'RegisterGroupSize'])->name('RegisterGroupSize');
    //Proposal
    Route::get('/view/proposal',[CoordinatorController::class,'loadViewProposal']);
    Route::get('/view/group/proposal/{id}',[CoordinatorController::class,'ViewProposal']);
    Route::get('/upload/group/proposal/{group_id}',[CoordinatorController::class,'loadUploadProposal']);
    Route::get('/reupload/group/proposal/{group_id}',[CoordinatorController::class,'loadUploadProposal']);
    //phase Urls
    Route::get('/manage/phases',[CoordinatorController::class,'loadPhaseMGT']);
    Route::get('/phases',[CoordinatorController::class,'loadPhasemanagement']);
    Route::get('/delete/phase/{id}',[CoordinatorController::class,'deletePhase']);
    Route::get('/edit/phase/{id}',[CoordinatorController::class,'loadeditPhasePage']);
    Route::get('/subphases',[CoordinatorController::class,'loadSubPhasemanagement']);
    Route::get('/add/phases',[CoordinatorController::class,'loadPhaseForm']);
    Route::post('/add/phase',[CoordinatorController::class,'AddPhase'])->name('AddPhase');
    Route::post('/edit/phase',[CoordinatorController::class,'EditPhase'])->name('EditPhase');
    //subphase Urls
    Route::get('/add/subphases',[CoordinatorController::class,'loadSubPhaseForm']);
    Route::post('/add/subphase',[CoordinatorController::class,'AddSubPhase'])->name('AddSubPhase');
    Route::get('/delete/subphase/{id}',[CoordinatorController::class,'deleteSubPhase']);
    Route::get('/edit/subphase/{id}',[CoordinatorController::class,'loadeditSubPhasePage']);
    Route::post('/edit/subphase',[CoordinatorController::class,'EditSubPhase'])->name('EditSubPhase');
    //import & export routes

    Route::get('/export/students',[CoordinatorController::class,'exportstudent'])->name('exportstudent');
    Route::get('/import/students',[CoordinatorController::class,'loadImportStuForm']);
    Route::post('/import/student',[CoordinatorController::class,'importStudent'])->name('importStudent');

    Route::get('/export/supervisors',[CoordinatorController::class,'exportsupervisor']);
    Route::get('/import/supervisors',[CoordinatorController::class,'loadImportSupForm']);
    Route::post('/import/supervisor',[CoordinatorController::class,'importSupervisor'])->name('importSupervisor');

    Route::get('/import/groups',[CoordinatorController::class,'loadImportGroupForm']);
    Route::post('/import/group',[CoordinatorController::class,'importGroup'])->name('importGroup');

    Route::get('/add/member',[CoordinatorController::class,'loadAddMemberForm']);
    Route::post('/add/member',[CoordinatorController::class,'AddMember'])->name('AddMember');
    Route::get('/remove/member',[CoordinatorController::class,'loadRemoveMemberForm']);
    Route::post('/remove/member',[CoordinatorController::class,'RemoveMember'])->name('RemoveMember');
    Route::get('/group-details/{id}',[CoordinatorController::class,'MemberDetails'])->name('MemberDetails');
    Route::get('/presentation/reports',[CoordinatorController::class,'ViewReports'])->name('ViewReports');
    Route::get('/presentation/reports/charts',[CoordinatorController::class,'Charts'])->name('Charts');
    Route::get('/get/subphasedata',[CoordinatorController::class,'GetSubphaseData'])->name('GetSubphaseData');
    Route::get('/export/group',[CoordinatorController::class,'exportGroup'])->name('exportGroup');

    Route::get('/title/report',[CoordinatorController::class,'TitleReport']);
    Route::get('/title/report/search',[CoordinatorController::class,'SearchTitleReport'])->name('SearchTitleReport');
    Route::get('/group-supervisor/report',[CoordinatorController::class,'GroupSupervisorReport']);
    Route::get('/group/supervisor/report/search',[CoordinatorController::class,'SearchGroupSupervisorReport'])->name('SearchGroupSupervisorReport');
    Route::get('/add/announcement',[CoordinatorController::class,'loadAnnForm']);
    Route::get('/manage/announcement',[CoordinatorController::class,'loadAnnouncement']);
    Route::post('/add/announcement',[CoordinatorController::class,'addAnnouncement'])->name('addAnnouncement');
    Route::get('/delete/announcement/{id}',[CoordinatorController::class,'deleteAnnouncement']);
    Route::get('/edit/announcement/{id}',[CoordinatorController::class,'loadEditPage']);
    Route::post('/edit/announcement',[CoordinatorController::class,'editAnnouncement'])->name('editAnnouncement');
    Route::get('/export/group/supervisor',[CoordinatorController::class,'exportGroupSupervisor'])->name('exportGroupSupervisor');

    Route::get('/groups/report',[CoordinatorController::class,'loadGroupReport']);
    Route::get('/groups/report/search',[CoordinatorController::class,'SearchGroupReport'])->name('SearchGroupReport');
    //get reports
    Route::get('/presentation/report',[CoordinatorController::class,'GetReport'])->name('GetReport');
    Route::get('/final/report',[CoordinatorController::class,'FinalReport'])->name('FinalReport');
    Route::get('/final/report/search',[CoordinatorController::class,'SearchFinalReport'])->name('SearchFinalReport');
    // manage presentation routes
    Route::get('/manage/presentation',[CoordinatorController::class,'loadManagePresentation']);
    Route::get('/enable/presentation/{id}',[CoordinatorController::class,'enablePresentation']);
    Route::get('/disable/presentation/{id}',[CoordinatorController::class,'disablePresentation']);
    Route::get('/completed/presentation/{id}',[CoordinatorController::class,'completePresentation']);
    Route::get('/disableall/presentation',[CoordinatorController::class,'disableallPresentation']);

});


Route::group(['middleware' => ['web','checkStudent']],function(){
    Route::get('/student/home',[StudentController::class,'loadStudeDashboard']);
    Route::post('/student/photo/upload',[StudentController::class,'StudentuploadPhoto'])->name('StudentuploadPhoto');
    Route::post('/student/change/password',[StudentController::class,'UpchangePassword'])->name('UpchangePassword');

    //group formation routes
    Route::get('/project/groups',[StudentController::class,'loadStudentList']);
    Route::get('/group',[StudentController::class,'loadListStudentGroupRequest']);
    Route::get('/get/student/details/{id}',[StudentController::class,'getMemberDetails'])->name('getMemberDetails');
    Route::get('/create/new/group',[StudentController::class,'CreateNewGroup'])->name('CreateNewGroup');

    //title routes
    Route::get('/project/title',[StudentController::class,'loadProjectTitle']);
    Route::get('/title/upload/form',[StudentController::class,'uploadTitleForm']);
    Route::post('/upload/title',[StudentController::class,'uploadProjectTitle'])->name('uploadProjectTitle');
    //title reupload
    Route::get('/title/re-upload/form/{id}',[StudentController::class,'ReuploadTitleForm']);
    Route::post('/re-upload/title',[StudentController::class,'ReuploadTitle'])->name('ReuploadTitle');
    //proposal/upload/form
    Route::get('/proposal/upload',[StudentController::class,'loadProposal']);
    Route::get('/proposal/upload/form',[StudentController::class,'loadProposalForm']);
    Route::post('/proposal/upload',[StudentController::class,'uploadProposal'])->name('uploadProposal');
    //supervisor
    Route::get('/view/supervisor',[StudentController::class,'ViewSupervisor']);
    Route::get('/view/announcement',[StudentController::class,'loadAnnouncements']);
    Route::get('/view/titles',[StudentController::class,'loadDoneTitles']);
    Route::get('/my/request',[StudentController::class,'loadRequest']);
    Route::post('/request/group',[StudentController::class,'RequestGroup'])->name('RequestGroup');
    Route::get('/accept/request/{id}',[StudentController::class,'AcceptRequest'])->name('AcceptRequest');
    Route::get('/reject/request/{id}',[StudentController::class,'RejectRequest'])->name('RejectRequest');
    Route::get('/cancel/request/{id}',[StudentController::class,'CancelRequest'])->name('CancelRequest');

});

Route::group(['middleware' => ['web','checkSupervisor']],function(){
    Route::get('/supervisor/home',[SupervisorController::class,'loadSuperDashboard']);
    Route::get('/assigned/groups',[SupervisorController::class,'loadAssignedGroup']);
    Route::get('/assess/groups',[SupervisorController::class,'loadAssessGroup']);
    Route::get('/assess/group/{id}',[SupervisorController::class,'loadAssessGroupForm']);
    Route::get('/get/subphase',[SupervisorController::class,'GetSubphase'])->name('GetSubphase');

    Route::get('/get-group-details/{id}',[SupervisorController::class,'getGroupDetail'])->name('getGroupDetail');
    //assessment
    Route::post('/assessment1',[SupervisorController::class,'Phase1Subphase1'])->name('Phase1Subphase1');
    Route::post('/assessment2',[SupervisorController::class,'Phase1Subphase2'])->name('Phase1Subphase2');
    Route::post('/assessment3',[SupervisorController::class,'Phase1Subphase3'])->name('Phase1Subphase3');
    Route::post('/assessment4',[SupervisorController::class,'Phase2Subphase1'])->name('Phase2Subphase1');
    Route::post('/assessment5',[SupervisorController::class,'Phase2Subphase2'])->name('Phase2Subphase2');
    Route::post('/assessment6',[SupervisorController::class,'Phase2Subphase3'])->name('Phase2Subphase3');
    Route::post('/assessment7',[SupervisorController::class,'Phase2Subphase4'])->name('Phase2Subphase4');
    Route::post('/assessment8',[SupervisorController::class,'Phase2Subphase5'])->name('Phase2Subphase5');

    Route::get('/view/announcements',[SupervisorController::class,'loadAnnouncement']);

});

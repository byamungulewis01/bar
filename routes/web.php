<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\MaritalController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProbonoController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\Auth\ForgetPassword;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SchedulerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PhonenumberController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\DisciplinaryController;
use App\Http\Controllers\LawscategoryController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\UserDashboardController;


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

Route::get('/', [SearchController::class, 'search'])->name('search');
Route::get('/search/{user}', [SearchController::class, 'result'])->name('result');

Route::get('/logout', [LogoutController::class, 'store'])->name('logout');

Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);

    Route::get('/forgotPassword', [ForgetPassword::class, 'index'])->name('password.forgot');
    Route::post('/forgotPassword', [ForgetPassword::class, 'send']);
    Route::get('/reset', [ForgetPassword::class, 'send'])->name('password.reset');
    Route::get('/check', [ForgetPassword::class, 'check'])->name('password.check');
    Route::post('/check', [ForgetPassword::class, 'checkPassword']);
    Route::get('/checkFailed', [ForgetPassword::class, 'checkFailed'])->name('password.checkFailed');
    Route::get('/emailSent', [ForgetPassword::class, 'emailSent'])->name('password.emailSent');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/newPassword', [LoginController::class, 'userPwd'])->name('newPassword');
    Route::post('/newPassword', [LoginController::class, 'storeUserPwd']);

    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('/my-discipline/{user}', [DisciplinaryController::class, 'mydiscipline'])->name('mydiscipline');
    Route::get('/phones', [PhonenumberController::class, 'index'])->name('phone');
    Route::post('/phones', [PhonenumberController::class, 'store']);
    Route::delete('/phones/{phonenumber}', [PhonenumberController::class, 'destroy'])->name('phone.delete');

    Route::get('/address', [AddressController::class, 'index'])->name('address');
    Route::post('/address', [AddressController::class, 'store']);
    Route::delete('/addresss/{address}', [AddressController::class, 'destroy'])->name('address.delete');
    
    Route::post('/areas', [AreaController::class, 'store'])->name('areas');
    Route::post('/social', [SocialController::class, 'store'])->name('social');
    Route::delete('/social', [SocialController::class, 'destroy']);

    Route::get('/allUsers', [UserController::class, 'index'])->name('users')->middleware('can:view-users');
    Route::put('/allUsers', [UserController::class, 'update'])->middleware('can:edit-users');
    Route::delete('/allUsers', [UserController::class, 'destroy'])->middleware('can:delete-users');



    Route::get('/my-profile', [UserProfileController::class, 'myprofile'])->name('myProfile');
    Route::get('/discipline-me', [UserProfileController::class, 'mydiscipline'])->name('mydiscipline');
    Route::get('/discipline-me/{case}', [UserProfileController::class, 'discipline_delails'])->name('discipline_delails');
    Route::get('/meeting-me', [UserProfileController::class, 'mymeeting'])->name('mymeetings');


});

Route::group(['middleware' => 'adminauth'], function(){

    Route::get('/changePassword', [LoginController::class, 'adminPwd'])->name('changePassword');
    Route::post('/changePassword', [LoginController::class, 'storeAdminPwd']);
   
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::post('/marital', [MaritalController::class, 'store'])->name('marital.new');
    Route::delete('/marital', [MaritalController::class, 'destroy'])->name('marital.delete');
    Route::put('/marital', [MaritalController::class, 'update'])->name('marital.update');
    
    Route::post('/lawcat', [LawscategoryController::class, 'store'])->name('lawcat.new');
    Route::delete('/lawcat', [LawscategoryController::class, 'destroy'])->name('lawcat.delete');
    Route::put('/lawcat', [LawscategoryController::class, 'update'])->name('lawcat.update');
    

    Route::get('/profile/{user}', [AdminController::class, 'profile'])->name('profile');
    Route::get('/discipline/{user}', [AdminController::class, 'discipline'])->name('user.discipline');
    Route::get('/discipline-datails/{user}/{case}', [AdminController::class, 'discipline_delails'])->name('user.discipline_details');

    Route::get('/meeting-view/{user}', [AdminController::class, 'meeting'])->name('user.meeting-view');
 




    Route::post('/profile/{user}', [UserController::class, 'changeStatus']);
    Route::delete('/profile/{user}', [UserController::class, 'destroy']);
    Route::get('/organizations', [OrganizationController::class, 'index'])->name('users.org');
    Route::post('/organizations', [OrganizationController::class, 'store']);
    Route::put('/organizations', [OrganizationController::class, 'update']);
    Route::get('/inactive', [UserController::class, 'deactivated'])->name('deactivated');
    Route::post('/inactive', [UserController::class, 'activate']);
    Route::get('/users', [UserController::class, 'index'])->name('users.ind');
    Route::post('/users', [UserController::class, 'store']);
    Route::put('/users', [UserController::class, 'update']);
    Route::delete('/users', [UserController::class, 'destroy'])->name('user.delete');
   
    
    Route::get('/disciplinary', [DisciplinaryController::class, 'index'])->name('cases.index');
    Route::get('/disciplinedetail/{case}', [DisciplinaryController::class, 'show'])->name('cases.show');
    Route::post('/disciplinary', [DisciplinaryController::class, 'store'])->name('cases.store');
    Route::put('/disciplinary/update', [DisciplinaryController::class, 'update'])->name('cases.update');
    Route::post('/disciplinarymember', [DisciplinaryController::class, 'addmember'])->name('cases.addmember');
    Route::put('/disciplinary', [DisciplinaryController::class, 'case_status'])->name('cases.status');
    Route::delete('/disciplinary', [DisciplinaryController::class, 'deleteparticipant'])->name('participant.delete');
    Route::put('/disciplinarySitting', [DisciplinaryController::class, 'sitting'])->name('cases.sitting');
    Route::post('/scheduleDecision', [SchedulerController::class, 'add_schedule_decision'])->name('cases.scheduleDecion');


    Route::get('/probono', [ProbonoController::class, 'index'])->name('probono.index');
    Route::post('/probono', [ProbonoController::class, 'store'])->name('probono.store');
    Route::get('/probono/{id}', [ProbonoController::class, 'show'])->name('probono.show');
    Route::post('/probonomember', [ProbonoController::class, 'addmember'])->name('probono.addmember');



    Route::get('/meetings', [MeetingController::class, 'index'])->name('meetings.index');
    Route::get('/meetings/{meeting}', [MeetingController::class, 'show'])->name('meetings.show');
    Route::get('/meetings/create', [MeetingController::class, 'create'])->name('meetings.create');
    Route::post('/meetings/create', [MeetingController::class, 'store'])->name('meetings.store');
    Route::get('/meetings/update', [MeetingController::class, 'update'])->name('meetings.update');
    Route::put('/meetings/update', [MeetingController::class, 'save'])->name('meetings.save');
    Route::post('/meetings/invite', [MeetingController::class, 'invite'])->name('meetings.invite');
    Route::delete('/meetings/remove', [MeetingController::class, 'removeInviter'])->name('meetings.removeInviter');


    Route::get('/roles', [RolesController::class, 'index'])->name('roles');
    Route::post('/roles', [RolesController::class, 'store']);
    Route::put('/roles/{user}', [RolesController::class, 'assign'])->name('assignRole');

});
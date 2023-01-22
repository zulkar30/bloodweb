<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\RoomController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\AftapController;
use App\Http\Controllers\Backsite\DonorController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\OfficerController;
use App\Http\Controllers\Backsite\PatientController;
use App\Http\Controllers\Backsite\PositionController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\PouchTypeController;
use App\Http\Controllers\Backsite\ScreeningController;
use App\Http\Controllers\Backsite\BloodDonorController;
use App\Http\Controllers\Backsite\CrossmatchController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\ProfessionController;
use App\Http\Controllers\Backsite\BloodSupplyController;
use App\Http\Controllers\Backsite\BloodRequestController;

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
    return view('auth.login');
});

// Backsite Page Start
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function(){

    // Dasboard Page
    Route::resource('dashboard', DashboardController::class);
    
    // User Page
    Route::resource('user', UserController::class);
    
    // Permission Page
    Route::resource('permission', PermissionController::class);

    // Position Page
    Route::resource('position', PositionController::class);

    // Pouch Type Page
    Route::resource('pouch_type', PouchTypeController::class);

    // Profession Page
    Route::resource('profession', ProfessionController::class);

    // Role Page
    Route::resource('role', RoleController::class);

    // Room Page
    Route::resource('room', RoomController::class);

    // Type User Page
    Route::resource('type_user', TypeUserController::class);
    
    // Aftap Page
    Route::resource('aftap', AftapController::class);

    // Blood Donor Page
    Route::resource('blood_donor', BloodDonorController::class);

    // Blood Request Page
    Route::resource('blood_request', BloodRequestController::class);

    // Blood Supply Page
    Route::resource('blood_supply', BloodSupplyController::class);
    
    // Crossmatch Page
    Route::resource('crossmatch', CrossmatchController::class);

    // Doctor Page
    Route::resource('doctor', DoctorController::class);

    // Donor Page
    Route::resource('donor', DonorController::class);

    // Officer Page
    Route::resource('officer', OfficerController::class);

    // Patient Page
    Route::resource('patient', PatientController::class);

    // Screening Page
    Route::resource('screening', ScreeningController::class);
});
// Backsite Page End

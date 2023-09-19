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
use App\Http\Controllers\Backsite\BloodTypeController;
use App\Http\Controllers\Backsite\DonorTypeController;
use App\Http\Controllers\Backsite\MaintenanceSectionController;
use App\Http\Controllers\Frontsite\AboutController;
use App\Http\Controllers\Frontsite\BloodDonorController as FrontsiteBloodDonorController;
use App\Http\Controllers\Frontsite\BloodRequestController as FrontsiteBloodRequestController;
use App\Http\Controllers\Frontsite\ContactController;
use App\Http\Controllers\Frontsite\HomeController;
use App\Http\Controllers\Frontsite\RegisterController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

// Backsite Page Start
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function(){

    // Dasboard Page
    Route::resource('dashboard', DashboardController::class);
    
    // User Page
    Route::resource('user', UserController::class);
    
    // Blood Type Page
    Route::resource('blood_type', BloodTypeController::class);

    // Donor Type Page
    Route::resource('donor_type', DonorTypeController::class);

    // Maintenance Section Page
    Route::resource('maintenance_section', MaintenanceSectionController::class);

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
    Route::get('export/aftap', [AftapController::class, 'exportAftap'])->name('export.aftap');

    // Blood Donor Page
    Route::resource('blood_donor', BloodDonorController::class);

    // Blood Request Page
    Route::resource('blood_request', BloodRequestController::class);
    Route::post('blood_request/accept/{id}', [BloodRequestController::class, 'accept'])->name('blood_request.accept');
    Route::post('blood_request/reject/{id}', [BloodRequestController::class, 'reject'])->name('blood_request.reject');

    // Blood Supply Page
    Route::resource('blood_supply', BloodSupplyController::class);
    
    // Crossmatch Page
    Route::resource('crossmatch', CrossmatchController::class);

    // Doctor Page
    Route::resource('doctor', DoctorController::class);

    // Donor Page
    Route::resource('donor', DonorController::class);
    Route::post('donor/{id}/accept', [DonorController::class, 'accept'])->name('donor.accept');
    Route::post('donor/{id}/reject', [DonorController::class, 'reject'])->name('donor.reject');

    // Officer Page
    Route::resource('officer', OfficerController::class);

    // Patient Page
    Route::resource('patient', PatientController::class);

    // Screening Page
    Route::resource('screening', ScreeningController::class);
});
// Backsite Page End

// Frontsite Page Start
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    // Blood Donor
    Route::get('blood_donor', [FrontsiteBloodDonorController::class, 'index'])->name('blood_donor');
    Route::post('blood_donor', [FrontsiteBloodDonorController::class, 'store'])->name('blood_donor.store');
    Route::get('blood_donor/success', [FrontsiteBloodDonorController::class, 'success'])->name('blood_donor.success');

    // Blood Request
    Route::get('blood_request', [FrontsiteBloodRequestController::class, 'index'])->name('blood_request');
    Route::post('blood_request', [FrontsiteBloodRequestController::class, 'store'])->name('blood_request.store');
    Route::get('blood_request/success', [FrontsiteBloodRequestController::class, 'success'])->name('blood_request.success');

    Route::resource('register_success', RegisterController::class);

});

// Home
Route::get('/', [HomeController::class, 'index'])->name('index');
// About
Route::get('about', [AboutController::class, 'index'])->name('about');
// Contact
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('contact/success', [ContactController::class, 'success'])->name('contact.success');
// Frontsite Page End

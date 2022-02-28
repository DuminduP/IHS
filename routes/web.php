<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GrievanceController;
use App\Http\Controllers\GrievanceOwnerController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SubInstitutionController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::middleware(['auth'])->group(function () {

Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/grievance/view/{id}', [GrievanceController::class, 'view'])->name('view-grievanse');
Route::get('/grievance/edit/{id}', [GrievanceController::class, 'edit'])->name('edit-grievanse');
Route::post('/grievance/edit/{id}', [GrievanceController::class, 'store']);

Route::get('/grievance/owner/edit/{id}', [GrievanceOwnerController::class, 'edit'])->name('edit-owner');
Route::post('/grievance/owner/edit/{id}', [GrievanceOwnerController::class, 'store']);

Route::get('/districts/{province_id}', [LocationController::class, 'getDistricts'])->name('get-districts');
Route::get('/cities/{districtId}', [LocationController::class, 'getCities'])->name('get-cities');
Route::get('/sub-institutions/{institutionId}', [SubInstitutionController::class, 'getSubInstitutions'])->name('get-sub-institution');

Route::get('/institution/list/', [InstitutionController::class, 'list'])->name('list-institutions');
Route::get('/institution/', [InstitutionController::class, 'new'])->name('new-institution');
Route::get('/institution/{id}', [InstitutionController::class, 'edit'])->name('edit-institution');
Route::get('/institution/view/{id}', [InstitutionController::class, 'view'])->name('view-institution');
Route::get('/institution/print/{id}', [InstitutionController::class, 'print'])->name('print-institution');
Route::post('/institution/{id}', [InstitutionController::class, 'update'])->name('update-institution');
Route::post('/institution/', [InstitutionController::class, 'store']);

Route::get('/staff/list/', [StaffController::class, 'list'])->name('list-staff');
Route::get('/staff/edit/{id}', [RegisteredUserController::class, 'edit'])->name('edit-staff');
Route::post('/staff/edit/{id}', [RegisteredUserController::class, 'update']);


});

Route::get('qr-code-g', function () {
    \QrCode::size(500)
            ->format('png')
            ->generate('www.google.com', public_path('images/qrcode.png'));
return view('qrCode');
});

require __DIR__.'/auth.php';

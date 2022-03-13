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
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\ReportController;


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
Route::get('/grievance/list', [GrievanceController::class, 'list'])->name('list-grievanse');
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

Route::get('/sub-institution/list/', [SubInstitutionController::class, 'list'])->name('list-sub-institutions');
Route::get('/sub-institution/', [SubInstitutionController::class, 'new'])->name('new-sub-institution');
Route::get('/sub-institution/{id}', [SubInstitutionController::class, 'edit'])->name('edit-sub-institution');
Route::get('/sub-institution/view/{id}', [SubInstitutionController::class, 'view'])->name('view-sub-institution');
Route::get('/sub-institution/print/{id}', [SubInstitutionController::class, 'print'])->name('print-sub-institution');
Route::post('/sub-institution/{id}', [SubInstitutionController::class, 'update'])->name('update-sub-institution');
Route::post('/sub-institution/', [SubInstitutionController::class, 'store']);

Route::get('/staff/list/', [StaffController::class, 'list'])->name('list-staff');
Route::get('/staff/edit/{id}', [RegisteredUserController::class, 'edit'])->name('edit-staff');
Route::post('/staff/edit/{id}', [RegisteredUserController::class, 'update']);

Route::get('/ratings/list/', [RatingsController::class, 'list'])->name('list-ratings');

Route::get('/reports/category/', [ReportController::class, 'category'])->name('report-category');
Route::get('/reports/status/', [ReportController::class, 'status'])->name('report-status');
Route::get('/reports/location/', [ReportController::class, 'location'])->name('report-location');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GrievanceController;
use App\Http\Controllers\GrievanceOwnerController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\SubInstitutionController;

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


Route::get('/', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('/grievance/view/{id}', [GrievanceController::class, 'view'])->middleware(['auth'])->name('view-grievanse');
Route::get('/grievance/edit/{id}', [GrievanceController::class, 'edit'])->middleware(['auth'])->name('edit-grievanse');
Route::post('/grievance/edit/{id}', [GrievanceController::class, 'store'])->middleware(['auth']);

Route::get('/grievance/owner/edit/{id}', [GrievanceOwnerController::class, 'edit'])->middleware(['auth'])->name('edit-owner');
Route::post('/grievance/owner/edit/{id}', [GrievanceOwnerController::class, 'store'])->middleware(['auth']);

Route::get('/districts/{province_id}', [LocationController::class, 'getDistricts'])->middleware(['auth'])->name('get-provinces');
Route::get('/cities/{districtId}', [LocationController::class, 'getCities'])->middleware(['auth'])->name('get-cities');
Route::get('/sub-institutions/{institutionId}', [SubInstitutionController::class, 'getSubInstitutions'])->middleware(['auth'])->name('get-sub-institution');

require __DIR__.'/auth.php';

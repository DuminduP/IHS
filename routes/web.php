<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GrievanceController;

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
Route::get('/grievanse/view/{id}', [GrievanceController::class, 'view'])->middleware(['auth'])->name('view-grievanse');
Route::get('/grievanse/edit/{id}', [GrievanceController::class, 'edit'])->middleware(['auth'])->name('edit-grievanse');



Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});

require __DIR__.'/auth.php';

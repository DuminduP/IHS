<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\InstitutionController;
use App\Http\Controllers\SubInstitutionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/institution/{id}', [ApiController::class, 'getInstitution']);
Route::get('/sub-institution/{id}', [ApiController::class, 'getSubInstitution']);
Route::post('/grievance', [ApiController::class, 'saveGrievance']);
Route::get('/grievance/details/{uuid}', [ApiController::class, 'getGrievanceByUuid']);
Route::post('/grievance/rate/', [ApiController::class, 'rate']);

Route::get('/districts/{province_id}', [LocationController::class, 'getDistricts']);
Route::get('/cities/{districtId}', [LocationController::class, 'getCities']);
Route::get('/institutions/{cityId}', [InstitutionController::class, 'getInstitutions']);
Route::get('/sub-institutions/{institutionId}', [SubInstitutionController::class, 'getSubInstitutions']);

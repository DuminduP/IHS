<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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
Route::post('/rate', 'InstitutionController@saveRate');

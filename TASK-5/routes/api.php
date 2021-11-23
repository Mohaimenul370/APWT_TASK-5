<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('company')->name('company.')->group(function () {
    Route::get('/get-all', [CompanyController::class, 'apiGetAll'])->name('api-index');
    Route::post('/create', [CompanyController::class, 'apiStore']);
    Route::get('/delete/{id}', [CompanyController::class, 'delete']);
    Route::get('/edit/{id}', [CompanyController::class, 'edit']);
    Route::post('/edit/{id}', [CompanyController::class, 'update']);
    Route::get('/export/Pdf', [CompanyController::class, 'export'])->name('export');
});


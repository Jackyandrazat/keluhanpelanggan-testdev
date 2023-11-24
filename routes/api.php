<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeluhanPelangganController;

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

Route::get('/keluhan_pelanggan', [KeluhanPelangganController::class, 'index']);
Route::post('/keluhan_pelanggan', [KeluhanPelangganController::class, 'store']);
Route::put('/keluhan_pelanggan/{id}', [KeluhanPelangganController::class, 'update']);
Route::delete('/keluhan_pelanggan/{id}', [KeluhanPelangganController::class, 'destroy']);

Route::get('/exportxlsx', [KeluhanPelangganController::class, 'exportxlsx']);
Route::get('/exporttxt', [KeluhanPelangganController::class, 'exporttxt']);
Route::get('/exportcsv', [KeluhanPelangganController::class, 'exportcsv']);
Route::get('/exportpdf', [KeluhanPelangganController::class, 'exportpdf']);
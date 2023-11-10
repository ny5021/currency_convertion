<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\API\DevisesController;
use App\Http\Controllers\API\PairesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::group()


Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);

// Route::middleware('auth:sanctum')->group( function() {
    Route::apiResource('devises', DevisesController::class); //Les routes devises.* de l'API
    Route::apiResource('paires', PairesController::class);
    Route::get('paires/{from_devise}/{to_devise}/{value}', [PairesController::class, 'valuePaire']);
    Route::put('paires/{from_devise}/{to_devise}', [PairesController::class, 'updatePaire']);
    Route::delete('paires/{from_devise}/{to_devise}', [PairesController::class, 'deletePaire']);
// });

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

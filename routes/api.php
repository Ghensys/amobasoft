<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Test
Route::get('/users', [UserController::class, 'data']);
//Route::get('/routes', [RouteController::class, 'index']);
Route::get('/reservations', [ReservationController::class, 'index']);

// Buscar reservaciones de un usuario por el Id del usuario
Route::get('/reservationsbyuser/{user_id}', [ReservationController::class, 'checkReservationsByUser']);

// Capacidad de ruta
Route::get('/routecapacity/{route_id}', [RouteController::class, 'checkCapacityById']);
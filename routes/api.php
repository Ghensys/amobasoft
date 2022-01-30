<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\CalendarController;
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


// Buscar reservaciones de un usuario por el Id del usuario
Route::get('/reservationsbyuser/{user_id}', [ReservationController::class, 'checkReservationsByUser']);

// Capacidad de ruta
Route::get('/routecapacity/{route_id}', [RouteController::class, 'checkCapacityById']); //verificada

// Capacidad de multiples rutas - http://127.0.0.1:8000/api/manyroutescapacity/a:2:%7Bi:0;i:1;i:1;i:2;%7D
Route::get('/manyroutescapacity/{array}', [RouteController::class, 'checkCapacityManyByIds']); //verificada

// Días de un calendario no disponible
Route::get('/calendardisableddays/{calendar_id}', [CalendarController::class, 'showCalendarDisabledDaysByCalendarId']); //verificada

// Días de uno o más calendario no disponibles - http://127.0.0.1:8000/api/manycalendarsdisableddays/a:2:%7Bi:0;i:2;i:1;i:3;%7D (valores 2 y 3 serializados)
Route::get('/manycalendarsdisableddays/{array}', [CalendarController::class, 'showCalendarDisabledDaysByManyCalendarIds']); //verificada

//test array
Route::get('/testarray', [RouteController::class, 'testArray']);
Route::get('/arrayserealizado/{array}', [RouteController::class, 'prueba']);

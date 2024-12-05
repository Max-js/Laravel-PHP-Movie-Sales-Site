<?php

use App\Http\Controllers\SalesDataController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/theater-sales', [SalesDataController::class, 'getTopTheaterBySales']);
Route::post('/theater-sales', [SalesDataController::class, 'getTopTheaterBySales']);

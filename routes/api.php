<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
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

Route::get('/cards',[CardController::class, 'getCards'])->name("cards.list");
Route::post('/cards',[CardController::class, 'addCards'])->name("cards.add");

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use App\Http\Controllers\ItemDetailModelController;
use App\Http\Controllers\PeminjamanModelController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('/item/{id}', [ItemDetailModelController::class,'show']);
Route::resource('/item',ItemDetailModelController::class);
Route::resource('/loan',PeminjamanModelController::class);
Route::fallback(function(){
    return "??";
});
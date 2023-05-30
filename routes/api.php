<?php

use App\Http\Controllers\ItemDetailModelController;
use App\Http\Controllers\PeminjamanModelController;
use App\Http\Controllers\UserController;
use App\Models\peminjamanModel;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('/item/{id}', [ItemDetailModelController::class,'show']);
Route::prefix('sevenman')->group(function(){
    
    Route::resource('/item',ItemDetailModelController::class);
    Route::resource('/loan',PeminjamanModelController::class);
    Route::controller(PeminjamanModelController::class)->group(function (){
        Route::post('/history/lab','getLoanLab');
        Route::post('/history/item','getLoanItem');
    });
    
    Route::controller(UserController::class)->group(function (){
        Route::post('/users','insertUser');
        Route::post('/users/login','searchUser');
        Route::post('/users/get1','getData');
        Route::post('/users/get-data-user','getSession');
    });
});

Route::fallback(function(){
    return "??";
});
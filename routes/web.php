<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MerchantController;

use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () {
    return view('home.index');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('/home',[AdminController::class,'index']);
route::get('/merchant',[MerchantController::class,'index']);
route::post('/register',[RegisteredUserController::class,'store']);

Route::get('simulate', function () {
    return view('simulate');
});

Route::post('get-token',[MPESAController::class,'getAccessToken']);
Route::post('register-urls',[MPESAController::class,'registerURLS']);
Route::post('simulate',[MPESAController::class,'simulateTransaction']);
Route::post('stkpush',[MPESAController::class,'stkPush']);
Route::get('stk',function(){
    return view('stk');
});



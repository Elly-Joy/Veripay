<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\payments\mpesa\MPESAResponsesController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('validation',[MPESAResponsesController::class,'validation']);
Route::post('confirmation',[MPESAResponsesController::class,'confirmation']);
//Route::post('stkpush',[MPESAResponsesController::class,'stkPush']);

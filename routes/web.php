<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Middleware\ChechIsNotLogged;
use App\Http\Middleware\CheckIsLogged;
use Illuminate\Support\Facades\Route;

//auth Route
Route::middleware([ChechIsNotLogged::class])->group(function(){
Route::get('/login', [AuthController::class,'login']);
Route::post('/loginSubmit', [AuthController::class,'loginSubmit']);
});


Route::middleware([CheckIsLogged::class])->group(function(){
    Route::get('/', [MainController::class,'index'])->name('home');
    Route::get('/newNote', [MainController::class,'newNote'])->name('new');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
});


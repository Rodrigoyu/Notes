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
    Route::post('/newNoteSubmit', [MainController::class, 'newNoteSubmit'])->name('newNoteSubmit');

    //edit note
    Route::get('/editNote/{id}', [MainController::class,'editNote'])->name('edit');
    Route::post('/editNoteSubmit', [MainController::class,'editNoteSubmit'])->name('editNoteSubmit');
    //delete note
    Route::get('/deleteNote/{id}', [MainController::class,'deleteNote'])->name('delete');
    Route::get('/delteNoteConfirm/{id}', [MainController::class, 'delteNoteConfirm'])->name('deleteConfirm');
    Route::get('/logout', [AuthController::class,'logout'])->name('logout');
});


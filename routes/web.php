<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "hello wolrd";
});

Route::get('about', function () {
    echo"about usgit";
});

Route::get('/main/{value}', [MainController::class, "index"]);
Route::get('/page2/{value}', [MainController::class, "page2"]);
Route::get('/page3/{value}', [MainController::class, "page3"]);

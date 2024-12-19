<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "hello wolrd";
});

Route::get('about', function () {
    echo"about usgit";
});

Route::get('/main', [MainController::class, "index"]);

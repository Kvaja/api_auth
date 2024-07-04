<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/', function () {
    return view('welcome');
});

//Route::view('/check','check');

Route::get('/student', [ApiController::class,'Showstudent']);
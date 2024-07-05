<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Middleware\CustomMiddleware;



Route::get('/', function () {

    
    return view('welcome');
});

//Route::view('/check','check');


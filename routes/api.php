<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/product/{id}/')

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

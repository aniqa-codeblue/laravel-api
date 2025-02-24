<?php

use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\Middleware\HandleCors;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([HandleCors::class])->group(function () {
    Route::post('/submit-form', [FormController::class, 'submitForm']);
});

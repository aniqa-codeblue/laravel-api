<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use Illuminate\Foundation\Http\Middleware\HandleCors;

Route::middleware([HandleCors::class])->group(function () {
    Route::post('/submit-form', 'App\Http\Controllers\FormController@submitForm');
});

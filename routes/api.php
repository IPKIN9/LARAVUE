<?php

use App\Http\Controllers\Api\QuoteControllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::controller(QuoteControllers::class)->group(function () {
    Route::get('/quotes', 'getAll');
    Route::post('/quotes', 'insertQuotes');
    Route::get('/quotes/{id}', 'getQuotes');
    Route::put('/quotes/{id}', 'putQuotes');
    Route::delete('/quotes/{id}', 'deleteQuotes');
});

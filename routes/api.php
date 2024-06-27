<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/reset', [AccountController::class, 'reset']);
Route::get('/balance', [AccountController::class, 'getBalance']);
Route::post('/account', [AccountController::class, 'createAccount']);
Route::post('/event', [EventController::class, 'handleEvent']);

<?php

use App\Http\Controllers\WikiController;
use Illuminate\Support\Facades\Route;



Route::get("/wiki/{title}", [WikiController::class, 'getInfo']);
Route::get("/wiki", fn () => view('wiki'));
Route::get("/", fn() => redirect('/wiki'));
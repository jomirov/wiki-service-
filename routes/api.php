<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

use App\Http\Controllers\WikiController;

Route::get('/wiki/{title}', fn ($title) => json_decode(Http::withHeaders(["User-Agent"=>"Laravel-Api/Laravel-App"])
    ->get('https://kk.wikipedia.org/w/api.php?action=parse&page='.$title.'&format=json')));
Route::get('/wiki/{title}/intro', [WikiController::class, 'getIntro']);

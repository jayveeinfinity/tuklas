<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;

Route::get('/', function () {
    return view('pages.landing');
})->name('home');
Route::get('/ideas/create', [IdeaController::class, 'create'])->name('ideas.create');
Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas.index');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas.index');
Route::get('/ideas/create', [IdeaController::class, 'create'])->name('ideas.create');
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
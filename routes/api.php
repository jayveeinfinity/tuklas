<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AIController;
use App\Http\Controllers\IdeaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// routes/api.php
Route::post('/ai/generate-idea', [AIController::class, 'generateIdea']);
Route::post('/ideas/save', [IdeaController::class, 'store'])->name('ideas.store');
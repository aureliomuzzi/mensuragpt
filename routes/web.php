<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestaoController;
use App\Http\Controllers\AlternativesController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::resource('users', UserController::class)->except(['destroy']);
    Route::get('/users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('questions', QuestaoController::class)->except(['destroy']);
    Route::get('/questions/{id}/destroy', [QuestaoController::class, 'destroy'])->name('questions.destroy');

    Route::resource('alternatives', AlternativesController::class)->except(['destroy']);
    Route::get('/alternatives/{id}/destroy', [AlternativesController::class, 'destroy'])->name('alternatives.destroy');

    Route::resource('templates', TemplatesController::class)->except(['destroy']);
    Route::get('/templates/{id}/destroy', [TemplatesController::class, 'destroy'])->name('templates.destroy');

});
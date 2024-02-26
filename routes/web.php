<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuestaoController;
use App\Http\Controllers\AlternativaController;
use App\Http\Controllers\GabaritoController;
use App\Http\Controllers\HomeController;

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::resource('users', UserController::class)->except(['destroy']);
    Route::get('/users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('questao', QuestaoController::class)->except(['destroy']);
    Route::get('/questao/{id}/destroy', [QuestaoController::class, 'destroy'])->name('questao.destroy');

    Route::resource('alternativa', AlternativaController::class)->except(['destroy']);
    Route::get('/alternativa/{id}/destroy', [AlternativaController::class, 'destroy'])->name('alternativa.destroy');

    Route::resource('gabarito', GabaritoController::class)->except(['destroy']);
    Route::get('/gabarito/{id}/destroy', [GabaritoController::class, 'destroy'])->name('gabarito.destroy');

});
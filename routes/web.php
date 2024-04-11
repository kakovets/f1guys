<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\F1Controller;


Route::get('/', [F1Controller::class, 'index'])->name('index');
Route::post('/', [F1Controller::class, 'addPilot'])->name('add');

Route::delete('/{id}', [F1Controller::class, 'deletePilot'])->name('delete');

Route::post('/populate', [F1Controller::class, 'populatePilotsTable'])->name('populate');

Route::get('/pilots/{id}', [F1Controller::class, 'pilot'])->name('pilots');

Route::post('/pilots/{id}/inc-wins', [F1Controller::class, 'incrementWins'])->name('inc_wins');
Route::post('/pilots/{id}/dec-wins', [F1Controller::class, 'decrementWins'])->name('dec_wins');



Route::get('/header', [F1Controller::class, 'header']);
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisuraController;
Route::get('/', function () {
    return view('welcome');
});



Route::get('/visura', [VisuraController::class, 'index'])->name('visura.index');
Route::post('/visura', [VisuraController::class, 'store'])->name('visura.store');
Route::put('/visura/{visura}', [VisuraController::class, 'update'])->name('visura.update');
Route::delete('/visura/{visura}', [VisuraController::class, 'destroy'])->name('visura.destroy');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisuraController;
Route::get('/', function () {
    return view('welcome');
});



Route::get('/visura', [VisuraController::class, 'index'])->name('visura.index');
Route::post('/visura', [VisuraController::class, 'store'])->name('photos.store');
Route::put('/visura/{visura}', [VisuraController::class, 'update'])->name('photos.update');
Route::delete('/visura/{visura}', [VisuraController::class, 'destroy'])->name('photos.destroy');

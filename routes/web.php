<?php

use App\Http\Controllers\RanobeFill;
use Illuminate\Support\Facades\Route;

Route::prefix('ranobe')->group(function () {
    Route::get('/show', [RanobeFill::class, 'show'])->name('ranobe.show');
});

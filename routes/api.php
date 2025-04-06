<?php

use App\Http\Controllers\Api\TitleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('titles', [TitleController::class, 'index']);

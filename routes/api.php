<?php

use \App\Http\Controllers\Api\RanobeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('titles', [RanobeController::class, 'index']);

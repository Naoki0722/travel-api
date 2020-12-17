<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrefecturesController;
use App\Http\Controllers\TouristsController;
use App\Http\Controllers\CommentsController;


Route::apiResource('/prefectures', PrefecturesController::class);
Route::apiResource('/tourists', TouristsController::class);
Route::apiResource('/comments', CommentsController::class);

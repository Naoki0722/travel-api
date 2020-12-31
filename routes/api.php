<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrefecturesController;
use App\Http\Controllers\TouristsController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\SearchesController;


Route::apiResource('/prefectures', PrefecturesController::class);
Route::apiResource('/tourists', TouristsController::class);
Route::apiResource('/comments', CommentsController::class);


//SearchesControllerを新たに作成、こちらで検索メソッドが実行された際に呼び出される→作るの不要でした
Route::get('/search/{any?}', [SearchesController::class, 'index'])->name('test');

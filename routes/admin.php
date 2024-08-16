<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ChallengesController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\SubmissionsController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')->group(function(){

    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::get('challenges',[ChallengesController::class,'index'])->name('challenges');

    Route::get('news',[NewsController::class,'index'])->name('news');

    Route::get('submissions',[SubmissionsController::class,'index'])->name('submissions');

    Route::get('users',[UserController::class,'index'])->name('users');

});

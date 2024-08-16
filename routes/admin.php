<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){

    Route::get('dashboard',function(){
        return view('admin.dashboard.index');
    })->name('dashboard');
    
    Route::get('challenges',function(){
        return view('admin.challenges.index');
    })->name('challenges');

    Route::get('news',function(){
        return view('admin.news.index');
    })->name('news');

    Route::get('submissions',function(){
        return view('admin.submissions.index');
    })->name('submissions');

    Route::get('users',function(){
        return view('admin.users.index');
    })->name('users');


});
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


use App\Http\Controllers\JobController;
Route::view('/', 'welcome');

//index
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);


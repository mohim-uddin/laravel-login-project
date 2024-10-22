<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
Route::view("/","layout.login")->name('home');


Route::get("/panda",[AuthController::class,"pandaP"])->name('panda');

//Route::view('/Registration','Layout/Registration');

//Route::view('/header','Layout/header');

//Route::view('/login','Layout/login');
Route::get("/login",[AuthController::class,"login"])->name('login-page');

Route::post("/login",[AuthController::class,"loginPost"])->name('login.post');

Route::get("/Registration",[AuthController::class,"Registration"])->name('register-page');

Route::get("/newR",[AuthController::class,"Registrationnew"])->name('registernew-page');

Route::post("/Registration",[AuthController::class,"registrationPost"])->name('register.post');
Route::post("/newR",[AuthController::class,"newRPost"])->name('registernew.post');

Route::get("/logout",[AuthController::class,"logout"])->name('logout');

Route::get("/dashboard",[AuthController::class,"dashboard"])->name('dashboard');

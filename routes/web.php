<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CVController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name("pages.home");

Route::group(["prefix"=>"/admin"], function (){
    Route::get("", [AdminController::class, "index"])->name("admin.home");

    Route::get("/curriculos-vitae", [CVController::class, "index"])->name("admin.cv.home");
});

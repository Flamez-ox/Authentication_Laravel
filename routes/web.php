<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, "index"])->name("home");


Route::get('/register', [HomeController::class, "register"])->name("register");
Route::post('/register_submit', [HomeController::class, "register_submit"])->name("register_submit");
Route::get('reg/verify/{token}/{email}', [HomeController::class, "reg"])->name("reg");


Route::get('/login', [HomeController::class, "login"])->name("login");





Route::get('/dashboard', [HomeController::class, "dashboard"])->name("dashboard");
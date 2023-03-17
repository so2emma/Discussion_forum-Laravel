<?php

use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource("discussions", DiscussionController::class);
Route::resource("discussions/{discussion}/replies", RepliesController::class);

Route::get("users/notifications", [UserController::class, "notifications"]);

Route::post("discussions/{discussion}/replies/{reply}/mark-as-best-reply", [DiscussionController::class, "reply"])->name("discussions.best-reply");

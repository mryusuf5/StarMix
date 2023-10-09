<?php

use App\Http\Controllers\PlaylistSongsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\PlaylistsController;

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

Route::get("/login", [UserController::class, "loginView"])->name("loginView");
Route::post("login", [UserController::class, "login"])->name("login");
Route::get("/register", [UserController::class, "registerView"])->name("registerView");
Route::post("/register", [UserController::class, "register"])->name("register");
Route::get("/logout", [UserController::class, "logout"])->name("logout");

Route::middleware("loggedIn")->group(function(){
    Route::get("/", [SongsController::class, "index"])->name("home");

    Route::resource("song", SongsController::class);
    Route::resource("playlists", PlaylistsController::class);
    Route::resource("playlistSongs", PlaylistSongsController::class);
});

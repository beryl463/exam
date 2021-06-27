<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LivreController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("user/index", [App\Http\Controllers\User\UserController::class, "index"]) ->name('user.index');

Route::get("user/livres/index", [App\Http\Controllers\User\LivreController::class, "index"]) ->name('user.livres.index');
Route::get("user/livres/create", [App\Http\Controllers\User\LivreController::class, "create"]) ->name('user.livres.create');
Route::post("user/livres/store", [App\Http\Controllers\User\LivreController::class, "store"]) ->name('user.livres.store');
Route::get("user/livres/edit/{id}", [App\Http\Controllers\User\LivreController::class, "edit"]) ->name('user.livres.edit');
Route::patch("user/livres/update/{id}", [App\Http\Controllers\User\LivreController::class, "update"]) ->name('user.livres.update');
Route::delete("user/livres/delete/{id}", [App\Http\Controllers\User\LivreController::class, "destroy"]) ->name('user.livres.delete');



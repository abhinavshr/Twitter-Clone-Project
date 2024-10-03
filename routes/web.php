<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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


Route::get('/', [DashboardController::class, 'index'] ) ->name ('dashboard');

Route::post('/idea', [IdeaController::class, 'store'] ) -> name('idea.create');

Route::get('/idea/{idea}', [IdeaController::class, 'show'] ) -> name('idea.show');

Route::get('/idea/{idea}/edit', [IdeaController::class, 'edit'] ) -> name('idea.edit')->middleware('auth');

Route::put('/idea/{idea}', [IdeaController::class, 'update'] ) -> name('idea.update')->middleware('auth');

Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show');

Route::delete('/idea/{id}', [IdeaController::class, 'destroy'] ) -> name('idea.destroy')->middleware('auth');

Route::get('/idea/{idea}/comments', [CommentController::class, 'store'] ) -> name('idea.comments.store')->middleware('auth');

Route::get('/register', [UserController::class, 'register'] ) ->name ('register');

Route::post('/register', [UserController::class, 'store'] );

Route::get('/login', [LoginController::class, 'login'] ) ->name ('login');

Route::post('/login', [LoginController::class, 'authentication'] );

Route::post('/logout', [LoginController::class, 'logout'] )->name('logout');

Route::resource('users', ProfileController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::get('profile', [ProfileController::class, 'profile'])->middleware('auth')->name('profile');



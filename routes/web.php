<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'show'])->name('showDashboard');

Route::prefix('ideas/')->group(function(){
    Route::post('share/', [IdeaController::class, 'share'])->name('shareIdea');
    Route::get('{id}/show', [IdeaController::class, 'show'])->name('showIdea');
    Route::get('{id}/edit', [IdeaController::class, 'edit'])->name('editIdea');
    Route::put('{id}/update', [IdeaController::class, 'update'])->name('updateIdea');
    Route::delete('{id}/delete', [IdeaController::class, 'delete'])->name('deleteIdea');
});

Route::prefix('comments/')->group(function(){
    Route::post('{id}/share', [CommentController::class, 'share'])->name('shareComment');
});

Route::prefix('auth/')->group(function(){
    Route::get('register/',[AuthController::class, 'register'])->name('register');
    Route::post('register/',[AuthController::class, 'store']);
    Route::get('login/', [AuthController::class, 'login'])->name('login');
    Route::post('login/', [AuthController::class, 'authenticate']);
    Route::get('logout/',[AuthController::class, 'logout'])->name('logout');
});

Route::prefix('profile/')->group(function(){
    Route::get('{id}/profile', [UserController::class, 'show'])->name('showProfile');
    Route::get('{id}/edit', [UserController::class, 'edit'])->name('editProfile');
    Route::put('{id}/update', [UserController::class, 'update'])->name('updateProfile');
});
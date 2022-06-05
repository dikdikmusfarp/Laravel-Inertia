<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Item\ApproveItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\EditUserController;
use App\Http\Controllers\Admin\User\ListUserController;
use App\Http\Controllers\Admin\User\UpdateUserController;
use App\Http\Controllers\Admin\Item\ListItemController;
use App\Http\Controllers\Admin\User\DeleteUserController;

Route::inertia('login', 'Admin/Auth/Login');
Route::post('login', LoginController::class)->name('login');


Route::middleware('auth', 'role.admin')->group(function () {
    // USER
    Route::inertia('admin', 'Admin/Home');
    Route::get('user', ListUserController::class)->name('user.index');
    Route::get('user/{user}/edit', EditUserController::class)->name('user.edit');
    Route::put('user/{user}', UpdateUserController::class)->name('user.update');
    Route::delete('user/{user}', DeleteUserController::class)->name('user.destroy');
    // ITEM
    Route::get('item', ListItemController::class)->name('item.index');
    Route::put('item/{item}/approve', ApproveItemController::class)->name('item.approve');
});

<?php

use App\Http\Controllers\Admin\Item\ListItemController;
use App\Http\Controllers\Admin\User\DeleteUserController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\Admin\User\EditUserController;
use App\Http\Controllers\Admin\User\ListUserController;
use App\Http\Controllers\Admin\User\UpdateUserController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::inertia('admin', 'Admin/Home');
Route::get('user', ListUserController::class)->name('user.index');
Route::get('user/{user}/edit', EditUserController::class)->name('user.edit');
Route::put('user/{user}', UpdateUserController::class)->name('user.update');
Route::delete('user/{user}', DeleteUserController::class)->name('user.destroy');

Route::get('item', ListItemController::class)->name('item.index');


require __DIR__ . '/auth.php';

<?php

use App\Http\Controllers\Frontend\Item\DetailItemController;
use App\Http\Controllers\Frontend\Item\EditItemController;
use App\Http\Controllers\Frontend\Item\UpdateItemController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\UploadItemController;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

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

Route::get('/', HomepageController::class)->name('homepage');
Route::get('/item/{item}', DetailItemController::class)->name('item.show');
Route::get('/profile', ProfileController::class)->middleware('auth')->name('profile');
Route::post('/item', UploadItemController::class)->middleware('auth')->name('item.store');
Route::get('/item/{item}/edit', EditItemController::class)->middleware('auth')->name('item.edit');
Route::put('/item/{item}/', UpdateItemController::class)->middleware('auth')->name('item.update');





Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');







require __DIR__ . '/auth.php';

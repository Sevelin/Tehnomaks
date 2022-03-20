<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\UserLinkController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'index']) -> name('welcome');

Route::get('/links', [HomeController::class, 'links'])->name('links');

Route::resource('/link', LinksController::class);
Route::get('/userLink', [UserLinkController::class, 'links']) -> name('userLink');
Route::get('/userChart', [UserLinkController::class, 'chart']) -> name('userChart');
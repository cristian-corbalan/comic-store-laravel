<?php

use App\Http\Controllers\ComicController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/comics', [ComicController::class, 'websiteList'])->name('comics.list');
Route::get('/comics/{comic}', [ComicController::class, 'websiteDetails'])->name('comics.details');


Route::get('/shop/add/', [ShopController::class, 'add'])->name('shop.add');

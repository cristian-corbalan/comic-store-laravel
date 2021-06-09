<?php

use App\Http\Controllers\ComicController;
use App\Http\Controllers\ControlPanelController;
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


Route::get('/intranet/', [ControlPanelController::class, 'home'])->name('control-panel.home');
Route::get('/intranet/comics', [ComicController::class, 'controlPanelList'])->name('control-panel.comics.list');
Route::get('/intranet/comics/nuevo', [ComicController::class, 'controlPanelForm'])->name('control-panel.comics.form');
Route::post('/intranet/comics/nuevo', [ComicController::class, 'new'])->name('control-panel.comics.new');

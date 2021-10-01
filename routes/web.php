<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComicController;
use App\Http\Controllers\ControlPanelController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Web site
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/comics', [ComicController::class, 'websiteList'])->name('comics.list');
Route::get('/comics/{comic}', [ComicController::class, 'websiteDetails'])->name('comics.details');

// Auth
Route::middleware(['guest'])->group(function () {

    Route::get('/ingresar', [AuthController::class, 'loginForm'])
        ->name('auth.login-form');

    Route::get('/registrarse', [AuthController::class, 'signUpForm'])
        ->name('auth.sign-up-form');

    Route::post('/ingresar', [AuthController::class, 'login'])
        ->name('auth.login');

    Route::post('/registrarse', [AuthController::class, 'signUp'])
        ->name('auth.sign-up');
});

Route::get('/salir', [AuthController::class, 'logOut'])
    ->name('auth.log-out')
    ->middleware(['auth']);

// Shop

Route::prefix('/shop')->name('shop.')->group(function () {
    Route::get('/agregar', [ShopController::class, 'add'])->name('add');

    Route::middleware(['auth'])->group(function () {
        Route::get('/vaciar', [ShopController::class, 'empty'])->name('empty');
        Route::get('/carrito', [ShopController::class, 'cart'])->name('cart');
        Route::get('/pago-confirmado', [ShopController::class, 'paymentConfirmed'])->name('payment.confirmed');
        Route::get('/pago-pendiente', [ShopController::class, 'paymentPending'])->name('payment.pending');
        Route::get('/pago-fallido', [ShopController::class, 'paymentFailed'])->name('payment.failed');
        Route::put('/asignar-cantidad', [ShopController::class, 'setQuantity'])->name('set-quantity');
        Route::delete('/quitar', [ShopController::class, 'remove'])->name('remove');
    });
});


// Control Panel

Route::prefix('/intranet')->name('control-panel.')->group(function () {
    Route::middleware(['access.control-panel'])->group(function () {
        Route::get('/', [ControlPanelController::class, 'home'])->name('home');
        Route::get('/comics', [ComicController::class, 'controlPanelList'])->name('comics.list');
        Route::get('/comics/nuevo', [ComicController::class, 'controlPanelFormNew'])->name('comics.form');
        Route::get('/comics/{comic}/editar', [ComicController::class, 'controlPanelFormEdit'])->name('comics.edit');
        Route::get('/users', [UserController::class, 'controlPanelList'])->name('users.list');
    });
});

// Comic CRUD
Route::prefix('/comics')->name('comics.')->group(function () {
    Route::middleware(['shop-manager'])->group(function () {
        Route::post('/nuevo', [ComicController::class, 'new'])->name('new');
        Route::delete('/{comic}/eliminar', [ComicController::class, 'delete'])->name('delete');
        Route::put('/{comic}/editar', [ComicController::class, 'edit'])->name('edit');
        Route::put('/{comic}/restaurar', [ComicController::class, 'restore'])->name('restore');
    });
});

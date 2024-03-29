<?php

use App\Http\Controllers\Api\ComicsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('comics', [ComicsController::class, 'all']);

Route::post('comics/nuevo', [ComicsController::class, 'create']);

Route::delete('comics/{comic}/eliminar', [ComicsController::class, 'delete']);

route::put('comics/{comic}/editar', [ComicsController::class, 'edit']);

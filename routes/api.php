<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

$controlador = 'App\Http\Controllers\ProductController';

Route::get('/', $controlador . '@apiDetails')->name('products.apiDetails');
Route::get('products', $controlador . '@index')->name('products.index');
Route::get('products/{code}', $controlador . '@show')->name('products.show');
Route::put('products/{code}', $controlador . '@update')->name('products.update');
Route::delete('products/{code}', $controlador . '@destroy')->name('products.destroy');

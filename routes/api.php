<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/dashboard', function () {
    return response()->json([
        'message' => 'Welcome to Stock Management API',
        'status' => 'Connected'
    ]);
});

Route::prefix('stock')->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'StockController@list');
    Route::post('/', 'StockController@store');
    Route::get('/{id}', 'StockController@show');
    Route::put('/{id}', 'StockController@update');
    Route::delete('/{id}', 'StockController@destroy');
});

Route::prefix('transaction')->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'TransactionController@list');
    Route::get('/userTransaction', 'TransactionController@getTransactionByUser');
    Route::get('/{id}', 'TransactionController@show');
    Route::delete('/{id}', 'TransactionController@destroy');
});

Route::prefix('category')->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'CategoryController@list');
    Route::post('/', 'CategoryController@store');
    Route::get('/{id}', 'CategoryController@show');
    Route::put('/{id}', 'CategoryController@update');
    Route::delete('/{id}', 'CategoryController@destroy');
});

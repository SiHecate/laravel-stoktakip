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

Route::prefix('report')->middleware('auth:sanctum')->group(function () {
    Route::get('/', 'ReportController@getAllReport');
    Route::get('/userReport', 'ReportController@getUserReports');
    Route::get('/{id}', 'ReportController@getReportById');
    Route::get('/yearly', 'ReportController@getYearlyReport');
    Route::get('/monthly', 'ReportController@getMonthlyReport');
    Route::get('/weekly', 'ReportController@getWeeklyReport');
    Route::get('/daily', 'ReportController@getDailyReport');
    Route::get('/customDay/{day}', 'ReportController@getCustomDayReport');
    Route::get('/customMonth/{month}', 'ReportController@getCustomMonthReport');
    Route::get('/customYear/{year}', 'ReportController@getCustomYearReport');
    Route::get('/customTimeRange/{start}/{end}', 'ReportController@getCustomTimeRangeReport');
});

Route::prefix('image')->group(function () {
    Route::get('/', 'ImageController@index');
    Route::post('/upload', 'ImageController@store');
    Route::get('/view', 'ImageController@show');
    Route::delete('/delete/{id}', 'ImageController@destroy');
});

<?php

use App\Http\Controllers\Api\DiscountController ;
use App\Http\Controllers\Api\SallerController;
use App\Http\Controllers\SaleController;
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


Route::post('/login',[SallerController::class, 'login']);


Route::middleware('auth:api')->group(function(){

    Route::post('/change/{id}',[DiscountController::class, 'update']);
    Route::delete('/delete/{id}',[DiscountController::class, 'destroy']);

    Route::delete('/saller/{id}',[SallerController::class, 'destroy']);
    Route::put('/saller/{id}',[SallerController::class, 'update']);
    Route::get('/chegirma',[DiscountController::class, 'index']);
    Route::get('/chegirma/{id}',[DiscountController::class, 'show']);
    Route::get('/questions/{id}',[DiscountController::class, 'questions']);
    Route::get('/sales',[DiscountController::class, 'sales']);
    Route::post('/sale',[SaleController::class, 'store']);
    Route::get('/save',[DiscountController::class, 'saves']);
    Route::delete('/save/{id}',[SaleController::class, 'destroy']);

});







<?php

use App\Http\Controllers\ConditionController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SallerController;
use App\Http\Middleware\Saller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/',[SaleController::class, 'index'])->name('home');

    
    Route::middleware('saller')->group(function(){
        
        Route::resource('/saller',SallerController::class);
        Route::resource('/prize',PrizeController::class);
        Route::resource('/discount',DiscountController::class);
        Route::resource('/question',QuestionController::class);
        Route::resource('/condition',ConditionController::class);
        Route::get('/sovrinlar/{id}',[SallerController::class, 'deletePrize']);
    });


    
    Route::resource('/sale',SaleController::class);
    Route::get('/success/{id}',[SaleController::class, 'success'])->name('success');
    Route::get('/erorr/{id}',[SaleController::class, 'erorr'])->name('erorr');
});





require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
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


// Route::get('/', function () {
    

// //Route::resource('/dashboard' , DashboardController::class) ;

// })->middleware(['auth'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
  
    Route::get('/' , [DashboardController::class , 'index']) ;
    Route::resource('/dashboard' , DashboardController::class);
   
});

Route::post('country/store', [CountryController::class, 'store'])->name('country.store');

require __DIR__.'/auth.php';

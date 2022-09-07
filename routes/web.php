<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index']);

    /**
     * Catagory Controller
     */
    Route::get('catagory', [CategoryController::class, 'index']);
    Route::get('catagory/create', [CategoryController::class, 'create']);
    Route::post('catagory', [CategoryController::class, 'store']);
    Route::get('catagory/{id}', [CategoryController::class, 'destroy']);
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\TypeServiceController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* seccion de dashboard */
Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
});

/* gestion de empresa */
Route::resource('companies', CompaniesController::class);

/* gestion de oficinas */
Route::resource('offices', OfficeController::class);

/* gestion de empleados */
Route::resource('employee',EmployeeController::class);

/* gestion de clientes */
Route::resource('customer',CustomerController::class);



/* gestion de type-service */
Route::resource('typeService',TypeServiceController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ContractsController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Rutas para administrador
/* Route::middleware(['auth', 'check.position'])->group(function () { */
Route::group(['middleware' => 'check.position:administrador'], function () {
    /* ----------------------------------------------- administrador -------------------------- */
    /* seccion de dashboard admin */
    Route::get('/dashboardAdmin', function () {
        return view('dashboard/dashboardAdmin');
    });
    /* gestion de empresa */
    Route::resource('companies', CompaniesController::class);
    
    /* gestion de oficinas */
    Route::resource('offices', OfficeController::class);
    
    /* gestion de empleados */
    Route::resource('employee',EmployeeController::class);
    
    /* gestion de type-service */
    Route::resource('typeService',TypeServiceController::class);
});

// Rutas para usuario
/* Route::middleware(['auth', 'check.position'])->group(function () { */
Route::group(['middleware' => 'check.position:usuario'], function () {
    /* ------------------------------------------- usuario ---------------- */
    /* seccion de dashboard user */
    Route::get('/dashboard', function () {
        return view('dashboard/dashboard');
    });
    /* gestion de clientes */
    Route::resource('customer',CustomerController::class);
    
    /* gestion de contratos */
    Route::resource('contracts',ContractsController::class);
});




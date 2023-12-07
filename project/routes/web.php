<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\ContractsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\TypeServiceController;
use App\Http\Controllers\BeneficiariesController;
use App\Http\Controllers\ImprimirController;

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
    Route::get('/companies/search', '\App\Http\Controllers\CompaniesController@search')->name('companies.search');
    Route::resource('companies', CompaniesController::class);
    
    /* gestion de oficinas */
    Route::resource('offices', OfficeController::class);
    
    /* gestion de empleados */
    Route::get('/employee/search', '\App\Http\Controllers\EmployeeController@search')->name('employee.search');
    Route::resource('employee',EmployeeController::class);
    
    /* gestion de type-service */
    Route::get('/typeService/search', '\App\Http\Controllers\TypeServiceController@search')->name('typeService.search');
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
    Route::get('/customer/search', '\App\Http\Controllers\CustomerController@search')->name('customer.search');
    Route::resource('customer',CustomerController::class);

    
    /* gestion de contratos */
    Route::get('/contracts/search', '\App\Http\Controllers\ContractsController@search')->name('contracts.search');
    Route::resource('contracts',ContractsController::class);

    /* gestion de beneficiarios */
    Route::get('beneficiaries/create/{contract}', '\App\Http\Controllers\BeneficiariesController@createWithContract')->name('beneficiaries.createWithContract');
    Route::resource('beneficiaries', BeneficiariesController::class);

    /* pdf generated */
    Route::get('imprimir/{id}', '\App\Http\Controllers\ImprimirController@imprimir')->name('imprimir');

});




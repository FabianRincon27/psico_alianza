<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PsicoAlianza\HomeController;
use App\Http\Controllers\PsicoAlianza\ConfigController;
use App\Http\Controllers\PsicoAlianza\EmployeeController;


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

Route::group(['middleware' => ['guest']], function () {
    // AUTH
    Route::get('/Ingreso', [LoginController::class, 'getLogin'])->name('login.get');
    Route::post('/login-post', [LoginController::class, 'postLogin'])->name('login.post');
    
    Route::get('/Registro', [RegisterController::class, 'getRegister'])->name('register.get');
    Route::post('/register-post', [RegisterController::class, 'postRegister'])->name('register.post');

});

// LOGOUT
Route::get('/logout', [LogoutController::class, 'getLogout'])->name('logout');


Route::group(['middleware' => ['auth']], function () {
    // GET
    Route::get('/Inicio', [HomeController::class, 'getHome'])->name('home');
    Route::get('/Empleados', [EmployeeController::class, 'getEmployees'])->name('employees.get');
    Route::get('/Configuracion', [ConfigController::class, 'getConfig'])->name('config.get');

    // POST
    Route::post('/employee-post', [EmployeeController::class, 'postEmployee'])->name('employees.post');
    Route::post('/employee-edit/{id}', [EmployeeController::class, 'editEmployee'])->name('employee.edit');
    Route::post('/employee-delete', [EmployeeController::class, 'deleteSeveralEmployees'])->name('employees.delete');
    Route::post('/configuration-position', [ConfigController::class, 'postPosition'])->name('config.position.post');
    Route::post('/configuration-position/{id}', [ConfigController::class, 'deletePosition'])->name('config.position.delete');
    Route::post('/configuration-area', [ConfigController::class, 'postArea'])->name('config.area.post');
    Route::post('/configuration-area/{id}', [ConfigController::class, 'deleteArea'])->name('config.area.delete');
    Route::post('/configuration-rol', [ConfigController::class, 'postRol'])->name('config.rol.post');
    Route::post('/configuration-rol/{id}', [ConfigController::class, 'deleteRol'])->name('config.rol.delete');


    // AJAX API
    Route::get('/cities-for-country', [EmployeeController::class, 'getCities'])->name('cities.get');
    Route::get('/validate-dni', [EmployeeController::class, 'validateDni'])->name('validate.dni.get');
});
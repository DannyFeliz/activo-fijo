<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Departments
Route::get("/departamentos", "DepartmentController@index");
Route::post("/departamentos", "DepartmentController@store");
Route::get("/departamentos/crear", "DepartmentController@create");
Route::get("/departamentos/{department}", "DepartmentController@edit");
Route::PUT("/departamentos/{department}", "DepartmentController@update");
Route::delete("/departamentos/{department}", "DepartmentController@destroy");

// Tipos de Activos
Route::get("/tipos-activos", "TypesAssetsController@index");
Route::post("/tipos-activos", "TypesAssetsController@store");
Route::get("/tipos-activos/crear", "TypesAssetsController@create");
Route::get("/tipos-activos/{typesAssets}", "TypesAssetsController@edit");
Route::PUT("/tipos-activos/{typesAssets}", "TypesAssetsController@update");
Route::delete("/tipos-activos/{typesAssets}", "TypesAssetsController@destroy");

// Employee
Route::get("/empleados", "EmployeesController@index");
Route::post("/empleados", "EmployeesController@store");
Route::get("/empleados/crear", "EmployeesController@create");
Route::get("/empleados/{employee}", "EmployeesController@edit");
Route::PUT("/empleados/{employee}", "EmployeesController@update");
Route::delete("/empleados/{employee}", "EmployeesController@destroy");

// Fixed Assets
Route::get("/activos-fijos", "FixedAssetsController@index");
Route::post("/activos-fijos", "FixedAssetsController@store");
Route::get("/activos-fijos/crear", "FixedAssetsController@create");
Route::get("/activos-fijos/{fixed_asset}", "FixedAssetsController@edit");
Route::PUT("/activos-fijos/{fixed_asset}", "FixedAssetsController@update");
Route::delete("/activos-fijos/{fixed_asset}", "FixedAssetsController@destroy");

// Depreciation Calculation
Route::get("/calculo-depreciaciones", "DepreciationCalculationController@index");
Route::post("/calculo-depreciacion/depreciar/{fixed_asset}", "DepreciationCalculationController@store");

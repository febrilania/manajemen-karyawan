<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PositionController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard',[Controller::class,'index'])->name('dashboard');

Route::get('positions',[PositionController::class, 'index'])->name('positions.index');
Route::post('positions',[PositionController::class,'store'])->name('positions.store');
Route::put('positions/{position}',[PositionController::class,'update'])->name('positions.update');
Route::delete('positions/{position}',[PositionController::class,'destroy'])->name('positions.destroy');


Route::get('departments',[DepartmentController::class, 'index'])->name('departments.index');
Route::post('departments',[DepartmentController::class,'store'])->name('departments.store');
Route::put('departmenst/{department}',[DepartmentController::class,'update'])->name('departments.update');
Route::delete('departments/{department}',[DepartmentController::class,'destroy'])->name('departments.destroy');

Route::get('employees',[EmployeeController::class,'index'])->name('employees.index');
Route::get('employees/create',[EmployeeController::class,'create'])->name('employees.create');
Route::get('employees/{employee}',[EmployeeController::class,'show'])->name('employees.show');
Route::get('employees/{employee}/edit',[EmployeeController::class,'edit'])->name('employees.edit');
Route::put('employees/{employee}',[EmployeeController::class,'update'])->name('employees.update');
Route::post('employees',[EmployeeController::class,'store'])->name('employees.store');
Route::delete('employees/{employee}',[EmployeeController::class,'destroy'])->name('employees.destroy');
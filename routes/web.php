<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pegewai', [\App\Http\Controllers\EmployeeController::class, 'index'])->name('pegewai');
Route::get('/add', [EmployeeController::class, 'add'])->name('add');
Route::post('/insert', [EmployeeController::class, 'insert'])-> name('insert');
Route::get('/edit/{id}', [EmployeeController::class, 'edit']) -> name('edit');
Route::post('update/{id}', [EmployeeController::class, 'update'])->name('update');
Route::get('/delete/{id}', [EmployeeController::class, 'delete']) -> name('delete');
Route::get('/exportpdf', [EmployeeController::class, 'export']) -> name('export');
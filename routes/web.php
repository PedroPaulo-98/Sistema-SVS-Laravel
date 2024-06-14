<?php

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

use App\Http\Controllers\AccessController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PeopleController;




Route::get('/login', [AccessController::class, 'login'])->name('login');
Route::post('/authentication', [AccessController::class, 'authentication']);
Route::get('/choose-unit', [AccessController::class, 'choose_unit'])->middleware('auth');
Route::post('/choose', [AccessController::class, 'choose'])->middleware('auth');
Route::get('/change-password', [AccessController::class, 'change_password'])->middleware('auth');
Route::post('/new-password', [AccessController::class, 'new_password'])->middleware('auth');
Route::get('/', [AccessController::class, 'index'])->middleware('auth');
Route::post('/logout', [AccessController::class, 'logout'])->middleware('auth');

Route::prefix('module')->middleware('auth')->group(function(){
    Route::get('/', [ModuleController::class, 'list']);
    Route::get('/create', [ModuleController::class, 'create']);
    Route::post('/store', [ModuleController::class, 'store']);
    Route::get('/{id}', [ModuleController::class, 'edit']);
    Route::put('/update/{id}', [ModuleController::class, 'update']);
    Route::put('/delete/{id}', [ModuleController::class, 'delete']);
});

Route::prefix('profile')->middleware('auth')->group(function(){
    Route::get('/', [ProfileController::class, 'list']);
    Route::get('/create', [ProfileController::class, 'create']);
    Route::post('/store', [ProfileController::class, 'store']);
    Route::get('/{id}', [ProfileController::class, 'edit']);
    Route::put('/update/{id}', [ProfileController::class, 'update']);
    Route::put('/delete/{id}', [ProfileController::class, 'delete']);
});

Route::prefix('permission')->middleware('auth')->group(function(){
    Route::get('/', [PermissionController::class, 'return']);
    Route::get('/{profile}/{erro}/{id}', [PermissionController::class, 'redirect']);
    Route::get('/{profile}', [PermissionController::class, 'create']);
    Route::post('/store/{profile}', [PermissionController::class, 'store']);
    Route::get('/{profile}/{id}', [PermissionController::class, 'edit']);
    Route::put('/update/{profile}/{id}', [PermissionController::class, 'update']);
    Route::put('/delete/{profile}/{id}', [PermissionController::class, 'delete']);
});

Route::prefix('user')->middleware('auth')->group(function(){
    Route::get('/', [UserController::class, 'list']);
    Route::get('/create', [UserController::class, 'create']);
    Route::post('/store', [UserController::class, 'store']);
    Route::get('/{id}', [UserController::class, 'edit']);
    Route::put('/update/{id}', [UserController::class, 'update']);
    Route::put('/function/{id}', [UserController::class, 'function']);
});

Route::prefix('unit')->middleware('auth')->group(function(){
    Route::get('/', [UnitController::class, 'list']);
    Route::get('/create', [UnitController::class, 'create']);
    Route::post('/store', [UnitController::class, 'store']);
    Route::get('/{id}', [UnitController::class, 'edit']);
    Route::put('/update/{id}', [UnitController::class, 'update']);
    Route::put('/active/{id}', [UnitController::class, 'active']);
});

Route::prefix('designation')->middleware('auth')->group(function(){
    Route::get('/', [DesignationController::class, 'return']);
    Route::get('/{unit}/{erro}/{id}', [DesignationController::class, 'redirect']);
    Route::get('/{unit}', [DesignationController::class, 'create']);
    Route::post('/store/{unit}', [DesignationController::class, 'store']);
    Route::get('/{unit}/{id}', [DesignationController::class, 'edit']);
    Route::put('/update/{unit}/{id}', [DesignationController::class, 'update']);
    Route::put('/delete/{unit}/{id}', [DesignationController::class, 'delete']);
});

Route::prefix('people')->middleware('auth')->group(function(){
    Route::get('/', [PeopleController::class, 'list']);
    Route::get('/create', [PeopleController::class, 'create']);
    Route::post('/store', [PeopleController::class, 'store']);
    Route::get('/{id}', [PeopleController::class, 'edit']);
    Route::put('/update/{id}', [PeopleController::class, 'update']);
    Route::put('/delete/{id}', [PeopleController::class, 'active']);
});

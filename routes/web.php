<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UsersController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect(uri:'/', destination:'login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UsersController::class)->middleware('role:manager');
    
    Route::resource('tasks', TasksController::class)->middleware('role:manager|creator|assignee');
    Route::post('/tasks/{id}/complete', [TasksController::class, 'complete'])->name('tasks.complete')->middleware('role:manager|creator|assignee');
    Route::post('/tasks/{id}/reopen', [TasksController::class, 'reopen'])->name('tasks.reopen')->middleware('role:manager|creator|assignee');
});
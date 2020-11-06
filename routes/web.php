<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

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


Route::get('projects/deletedprojects', [ProjectController::class, 'getDeleteProjects'])->name('getDeleteProjects');
Route::get('projects/deletedprojects/{id}', [ProjectController::class, 'restoreDeletedProjects'])->name('restoreDeletedProjects');
Route::get('projects/retoreprojects/{id}', [ProjectController::class, 'deletePermanently'])->name('deletePermanently');


Route::resource('projects', ProjectController::class);


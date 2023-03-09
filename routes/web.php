<?php

use App\Http\Controllers\Admin\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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


Auth::routes();


Route::get('/home',
[App\Http\Controllers\Admin\HomeController::class, 'index'])
->name('home');
 //% Pagina home, una volta loggato

Route::middleware('auth')
    //->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {
        Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
        //% Sintassi per la CRUD
        Route::resource('tickets', TicketController::class);
    });


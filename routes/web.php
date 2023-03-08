<?php

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

Route::get('/about', function () {
    return view('about');
});

Route::get('/user/{id}', function ($id) {
    return view('user', [
        'id' => $id,
        'name' => 'Ruma',
    ]);
});

Auth::routes();

Route::get('/user',
[App\Http\Controllers\UserController::class, 'index'])
->name('home');

Route::get('/home',
[App\Http\Controllers\Admin\HomeController::class, 'index'])
->name('home');
 //% Pagina home, una volta loggato


//TODO ROTTE MIDDLEWARE DA FAR FUNZIONARE nella sezione Admin
Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {
        Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
        //Route::resource('tickets', 'TicketController');
    });


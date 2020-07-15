<?php

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
Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->middleware(['auth']);

Route::get('edit', 'UserController@edit')->name('user.edit');
Route::put('update/{id}','UserController@update')->name('user.update');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('paciente', 'PacienteController');
Route::resource('cita', 'CitaController');
Route::resource('documentos', 'DocumentoController');
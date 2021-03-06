<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VagasController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\AdmController;

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
    return to_route('vagas.index');
});


Route::resource('/vagas', VagasController::class)->only([
    'index',
    'create',
    'store',
    'show',
]);

Route::get('/politica_de_privacidade', [VagasController::class, 'politica_de_privacidade'])->name('politicaDePrivacidade');

Route::get('/termos_de_uso', [VagasController::class, 'termos_de_uso'])->name('termosDeUso');

Route::resource('/adm', AdmController::class)->only([
    'edit',
    'update',
    'destroy',
]);

Route::get('/user', [UserController::class, 'logout'])->name('user.logout');
Route::post('/user/{id}', [UserController::class, 'upload'])->name('user.upload');
Route::get('/auth/{provider}', [UserController::class, 'redirectToProvider'])->name('social.login');
Route::get('/auth/{provider}/callback', [UserController::class, 'handleToCallback'])->name('social.callback');
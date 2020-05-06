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
Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/admin/clientes', 'ClienteController@index')->name('admin.clientes.index');
Route::get('/admin/clientes/adicionar', 'ClienteController@adicionar')->name('admin.clientes.adicionar');
Route::post('/admin/clientes/salvar', 'ClienteController@salvar')->name('admin.clientes.salvar');
Route::get('/admin/clientes/editar/{id}', 'ClienteController@editar')->name('admin.clientes.editar');
Route::put('/admin/clientes/atualizar/{id}', 'ClienteController@atualizar')->name('admin.clientes.atualizar');
Route::get('/admin/clientes/deletar/{id}', 'ClienteController@deletar')->name('admin.clientes.deletar');

Route::namespace('Plano')->group(function () {
    Route::post('/login/logar', 'TblusuController@login')->name('login.login');
    Route::get('/login/logout', 'TblusuController@logout')->name('login.logout');

    Route::group(['middleware' => ['auth:plano']], function () {
        //CAMINHO DA URL           //CONTROLER DA ROTA       //APELIDO PARA ROTA     
        Route::get('/login/index', 'TblusuController@index')->name('tblusu.index');
    });
});
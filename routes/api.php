<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/', function () {    
    return view('login');
})->name('login');

Route::group(['middleware'=>'clientes'], function(){        
        
        Route::namespace('Plano')->group(function () {
            Route::post('/login/logar','TblusuController@login')->name('login.login') ;
            Route::get('/login/logout','TblusuController@logout')->name('login.logout') ;
            
            Route::group(['middleware'=>['clientes','auth']], function(){                
                //CAMINHO DA URL   //CONTROLER DA ROTA       //APELIDO PARA ROTA     
                Route::get('/login/index','TblusuController@index')->name('tblusu.index');           
            });            
        });              
});
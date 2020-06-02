<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Plano\Tblusu;
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

Route::post('/cadastro', function (Request $request) {
    
    $data = $request->all();
   
    $tblusu = Tblusu::create([
        'usucod' => $data['usucod'],
        'usunome' => $data['usunome'],
        'nome' => $data['nome'],
        'ususenha' => $data['ususenha'],
        'situacao' => $data['situacao'],
        'status' => $data['status'],
        'email' => $data['email']
    ]);

    $tblusu->token = $tblusu->createToken($tblusu->usunome)->accessToken;    

    return $tblusu;
});

Route::namespace('Plano')->group(function () {
    Route::post('/login/logar', 'TblusuController@login')->name('login.login');
});

Route::middleware(['auth:api'])->get('/usuario', function (Request $request) {
    return $request->user();
});

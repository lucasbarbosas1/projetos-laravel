<?php

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

Route::get('/',"clienteController@index");

/*
Route::get('/', function () {
    return view('desafio1/principal');
});
*/
Route::resource("/cliente","clienteController");

Route::get("/desafio2","desafio2Controller@index");

Route::post("/desafio2/calcular","desafio2Controller@gerar");

Route::get("/cadastro",function (){
    return view("desafio1/cadastro");
});
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home',
    'uses' => 'parceiros@home'
]);

Route::resource('parceiro','parceiros');

Route::get('parceiros/autocomplete', 'parceiros@autocomplete');

Route::get('parceiro/update','parceiros@update');

Route::get('parceiros/gerenciar', 'parceiros@gerenciar');

Route::get('parceiros/editar_js/{parceiro}/', 'parceiros@editar_js');

Route::get('parceiros/listar_js/{parceiro?}/{regiao?}', 'parceiros@listar_js');
<?php
/**
 * Created by PhpStorm.
 * User: wes_x
 * Date: 18/06/2016
 * Time: 15:54
 */
?>

@extends('layout.assets')
@extends('layout.modals')
@section('menu')
    <div class="header-layout">
        <div class="container">
            <img src="https://partner-cel-wesxd.c9users.io/assets/imagens/logo.png">
        </div>
    </div>
    <div class="navbar navbar-inverse" style="border-radius:0px;" role="navigation">
        <ul class="nav navbar-nav" id="menu">
            <li><a href="/">Principal</a></li>
            <li><a href="javascript:" onclick="admin() == true ? abrir_modal():window.alert('Senha incorreta');">Cadastrar</a></li>
            <li><a href="/parceiros/gerenciar">Gerenciar</a></li>
            <li><a href="/parceiro/listar/">Listar</a></li>
        </ul>
    </div>
@stop

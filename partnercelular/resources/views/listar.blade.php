<?php
/**
 * Created by PhpStorm.
 * User: wes_x
 * Date: 19/06/2016
 * Time: 09:28
 */
?>

@extends('layout.menu')

@section('content')
    <script type="text/javascript">
        $(function () {
            limpar();
        });

        function limpar() {
            $("#referencia").val('');
            $("#parceiro").val('');
            listar();
        }
    </script>
    <div style="width: 80%; margin: 0 auto; background-color: #EEE9E9; padding: 2px 0; border-radius: 5px;">
        <div style="width: 100%; border-bottom:solid black 1px">
            <h4 style="text-align: center; width:100%;"><b>Pesquisar parceiro</b></p></h4>
        </div>
        <table class="formulario-especifico" style="width: 50%; margin:0 auto;">
            <tr>
                <td style="padding: 5px; padding-top: 5px;">
                    <div >
                        <label>Região:</label>
                        <select name="tipo" class="form-control" id="referencia">
                            <?php echo $opcoes?>
                    </div>
                </td>
                <td style="padding: 5px">
                    <div id="nome" class="formulario">
                        <label>Nome:</label>
                        <input class="form-control" id="parceiro" type="text"/>
                    </div>
                </td>
            </tr>
            <tr>
                <td style="padding: 5px; text-align: right">
                    <button style="width: 50%;" type="clear" onclick="limpar();" class="btn btn-danger">Limpar</button>
                </td>
                <td style="padding: 5px">
                    <button style="width: 50%;" id="" type="button" onclick="listar(document.getElementById('referencia').value,document.getElementById('parceiro').value)" class="btn btn-warning btn-block">Pesquisar</button>
                </td>
            </tr>
        </table>
    </div>
    </br>
    <div align="center" id="listar-especifico">
        <div id="listar-bibliografias">
            <table class="listar">
                <thead>
                <tr><td id="cadastros" colspan=3>Parceiros Cadastrados</td></tr>
                <tr class="linha-um">
                    <td style="width: 30%"><b>Nome</b></td>
                    <td style="width: 20%"><b>Telefone</b></td>
                    <td style="width: 20%"><b>Região</b></td>
                </tr>
                </thead>
                <tbody id="tabela_parceiro" >
                </tbody>
            </table>
        </div>
    </div>
@stop
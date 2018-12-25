
@extends('layout.menu')

@section('content')
<b>Para pesquisar utilize o Pesquisar do navegador</b>
<div align="center" id="listar-especifico">
                <p><b>Parceiros cadastrados.</b></p>
                <div id="listar-bibliografias">
                    <table class="listar">
                        <thead>
                        <tr class="linha-um">
                            <td style="width: 40%"><b>Nome</b></td>
                            <td style="width: 20%"><b>Telefone</b></td>
                            <td style="width: 20%"><b>Região</b></td>
                            <td style="width: 20%"><b>Opções</b></td>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($parceiros as $data)
                            {
                            ?>
                        <tr>
                            <td><?= $data['nome']?></td>
                            <td><?= $data['telefone']?></td>
                            <td><?= $data['regiao']?></td>
                            <td>
                                <!-- Opções -->
                                <div style="width: 100%" class="btn-group">
                                            <button style="width: 100%" type="button" class="btn btn-default" data-toggle="modal" onclick="editar(<?=$data['id']?>)">
                                                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar
                                            </button>
                                        <button style="width: 100%" type="button" onclick="excluir(<?=$data['id']?>)" class="btn btn-danger" data-toggle="modal">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir
                                        </button>
                                </div>
                            </td>
                        </tr>
                        <?php }?>                        
                        </tbody>
                    </table>
                </div>
            </div>


@stop
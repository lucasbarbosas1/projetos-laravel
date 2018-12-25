<?php
/**
 * Created by PhpStorm.
 * User: wes_x
 * Date: 18/06/2016
 * Time: 17:34
 */
?>

@section('modals')
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" role="dialog" aria-labelledby="add-bibLabel" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cadastrar Parceiro</h4>
                </div>
                <div class="modal-body">
                    <table class="circulacao">
                        {{ Form::open(array('route' => array('parceiro.store'), 'method' => 'POST' )) }}
                            <tr>
                                <td>
                                    {{Form::text('parceiro_nome',null,['class' => 'form-control', 'placeholder'=> 'Nome']) }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{Form::text('parceiro_telefone',null,['class' => 'form-control', 'placeholder'=> '(99) 9 9999-9999','id'=> 'parceiro_telefone']) }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{Form::text('parceiro_regiao',null,['class' => 'form-control', 'id'=> 'parceiro_regiao', 'placeholder'=> 'Região']) }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" class="btn btn-default" value="Cadastrar"/>
                                </td>
                            </tr>
                        {{Form::close()}}
                    </table>
                </div>
            </div>
        </div>
    </div>
  
      <div class="modal fade" id="editar" tabindex="-1" role="dialog" role="dialog" aria-labelledby="add-bibLabel" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Cadastrar Parceiro</h4>
                </div>
                <div class="modal-body">
                    <table class="circulacao">
                        {{ Form::open(array('action' => array('parceiros@update'), 'method' => 'PUT' )) }}
                            <tr>
                                <td>
                                    {{Form::hidden('parceiro_id',null,['class' => 'form-control', 'placeholder'=> 'Nome','id'=> 'parceiro_id_editar']) }}
                                    {{Form::text('parceiro_nome',null,['class' => 'form-control', 'placeholder'=> 'Nome','id'=> 'parceiro_nome_editar']) }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{Form::text('parceiro_telefone',null,['class' => 'form-control', 'placeholder'=> '(99) 9 9999-9999','id'=> 'parceiro_telefone_editar']) }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{Form::text('parceiro_regiao',null,['class' => 'form-control', 'id'=> 'parceiro_regiao_editar', 'placeholder'=> 'Região']) }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" class="btn btn-default" value="Cadastrar"/>
                                </td>
                            </tr>
                        {{Form::close()}}
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('jsrender')
    @if(Session::has('flash_message'))
    <script>
    window.onload = function(){
        window.alert("{{ Session::get('flash_message') }}");
    }
    </script>
    @endif

    <script id="listar_parceiro" type="text/x-jsrender">
        <tr>
            <td><%:nome%></td>
            <td><%:telefone%></td>
            <td><%:regiao%></td>
        </tr>
</script>

@stop

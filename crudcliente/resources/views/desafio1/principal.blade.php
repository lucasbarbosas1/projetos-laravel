<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Defafio 1 - Home</title>

    <link rel="stylesheet" href="{{asset("/assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("/assets/css/style.css")}}">
</head>
<body>
<div class="nav-side-menu">
    <div class="brand">Desafio</div>
    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
    <div class="menu-list">
        <ul id="menu-content" class="menu-content collapse out">
            <li>
                <a href="{{ url("/") }}">
                    <i class="fa fa-dashboard fa-lg"></i> Desafio 1
                </a>
            </li>
            <li>
                <a href="{{url("/desafio2")}}">
                    <i class="fa fa-dashboard fa-lg"></i> Desafio 2
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">Lista de Clientes</h3>
        </div>
        <div class="panel-body">
            <div class="btn btn-primary">
                <span><a style="text-decoration:none; color: white;" href="{{url("cadastro")}}">Cadastrar</a></span>
            </div>
        </div>
        <br>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" width="5%">#</th>
                <th scope="col" width="8%">CPF/CNPJ</th>
                <th scope="col" width="15%">Nome</th>
                <th scope="col" width="10%">E-mail</th>
                <th scope="col" width="5%">Dt Nascimento</th>
                <th scope="col" width="5%">Contato</th>
                <th scope="col" width="15%">Opções</th>
            </tr>
            </thead>
            <tbody>
            @foreach($lista as $clientes)
                @php
                    $data = date("d/m/Y",strtotime($clientes->DtNascimento));
                @endphp
            <tr>
                <th scope="row">{{$clientes->id}}</th>
                <td>{{$clientes->CGC}}</td>
                <td>{{$clientes->Nome}}</td>
                <td>{{$clientes->Email}}</td>
                <td>{{$data}}</td>
                <td>{{$clientes->Contato}}</td>
                <td>
                    <div class="form-inline">
                        <a href="{{action('clienteController@edit',$clientes->id)}}" class="btn btn-warning">Editar</a>
                        <form style="margin-left: 20px;" action="{{action('clienteController@destroy', $clientes->id)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Excluir</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
</div>

<script src="{{asset("/assets/js/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("/assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("/assets/js/jquery.mask.min.js")}}"></script>
</body>
</html>
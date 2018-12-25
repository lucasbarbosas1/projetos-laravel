<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Defafio 1 - Cadastro</title>

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
            <h3 class="panel-title text-center">Anagrama</h3>
        </div>

        <div class="panel-body">

            {{ Form::open(array('url' => '/desafio2/calcular','class'=>"form-horizontal")) }}
            <fieldset>
                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Palavar</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nome" name="Palavra">
                    </div>
                </div>
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Gerar
            </button>
            </form>
        </div>
            @isset($lista)
            <div>
                <h3 class="panel-title text-center">Resultado</h3>
            @foreach($lista as $palavra)
                    {{$palavra}}
                @endforeach
            </div>
            @endisset
    </div>
</div>

<script src="{{asset("/assets/js/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("/assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("/assets/js/jquery.mask.min.js")}}"></script>
</body>
</html>
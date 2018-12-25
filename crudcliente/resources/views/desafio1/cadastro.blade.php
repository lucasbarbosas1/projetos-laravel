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
            <h3 class="panel-title text-center">Cadastro de Cliente</h3>
        </div>

        <div class="panel-body">
            {{ HTML::ul($errors->all()) }}

                {{ Form::open(array('url' => 'cliente','class'=>"form-horizontal")) }}
                <fieldset>
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">Nome</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="nome" name="Nome">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nome" class="col-sm-2 control-label">CPF/CNPJ</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="CGC" name="CGC">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="data-nascimento" class="col-sm-2 control-label">Data de Nascimento</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="data-nascimento" name="DtNascimento">
                        </div>
                    </div>
                </fieldset>
                <fieldset>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" id="email" name="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefone" class="col-sm-2 control-label">Contato</label>
                        <div class="col-sm-4">
                            <input type="tel" class="form-control" id="contato" name="Contato">
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Gravar
                </button>
            </form>
        </div>
    </div>
</div>

<script src="{{asset("/assets/js/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("/assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("/assets/js/jquery.mask.min.js")}}"></script>
<script>
    $(document).ready(function() {
        $('#data-nascimento').mask('00/00/0000');
        var options =  {
            onKeyPress: function(cgc, e, field, options) {
                var masks = ['000.000.000-000', '00.000.000/0000-00'];
                var mask = (cgc.length>14) ? masks[1] : masks[0];
                $('#CGC').mask(mask, options);
            }};
        $('#CGC').mask('000.000.00-00', options);
    });
</script>
</body>
</html>
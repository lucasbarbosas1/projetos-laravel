function abrir_modal()
{
    $("#parceiro_regiao").autocomplete({
        source: "/parceiros/autocomplete",
        minLengh: 3,
        select: function (event,ui) {
            $("#parceiro_regiao").val(ui.item.value);
        }
    });
    $("#parceiro_telefone").mask('(99) 9 9999-9999');
    $("#myModal").modal("show");
}


function listar(regiao,parceiro) {

    var url;


    if(typeof regiao == "undefined")
    {
        url = '/parceiros/listar_js/';
    }
    else
    {
        if(parceiro == '')
        {
            url = '/parceiros/listar_js/'+regiao;
        }
        else
        {
            if(regiao == '')
            {
                regiao = 'vazio';
            }
            url = '/parceiros/listar_js/'+regiao+'/'+parceiro;
        }
    }
    $.views.settings.delimiters("<%", "%>");
    $.getJSON(url, function(data){
        var template = $.templates("#listar_parceiro");
        var output = template.render(data);
        $("#tabela_parceiro").html(output);
    });
}

function CarregarJsonFuncionario(id_funcionario){
    $("#parceiro_telefone_editar").mask("(99) 9 9999-9999");
    $.get('/parceiros/editar_js/'+id_funcionario,{
        id_funcionario:id_funcionario
    },function(data){
        $('#parceiro_id_editar').val(id_funcionario);
        $('#parceiro_nome_editar').val(data.nome);
        $('#parceiro_telefone_editar').val(data.telefone);
        $('#parceiro_regiao_editar').val(data.regiao);
    }, 'json');
}

function editar(id_funcionario){
    CarregarJsonFuncionario(id_funcionario);
    $('#editar').modal('show');
}

function excluir(codigo) {
    var resp = window.confirm("Deseja excluir o parceiro ?");

    if(resp == true)
    {
        $.post(baseurl+'gerenciar/excluir/'+codigo,
            function () {
                window.alert("Parceiro excluido com sucesso.");
                window.location=baseurl;
            });
    }

}

function admin() {
    var resp = window.prompt("Digite a senha: ");
    if(resp == "123456")
    {
        return true;
    }
    else
        return false;
}
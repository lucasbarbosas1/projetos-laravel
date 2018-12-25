<?php

namespace App\Http\Controllers;

use App\parceiro;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Response;


class parceiros extends Controller
{

    public function home()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['parceiro_regiao'] = $this->cadastrarRegiao($input['parceiro_regiao']);
        DB::insert('insert into parceiro(Nome,Telefone,Regiao) value(?,?,?)',[$input['parceiro_nome'],$input['parceiro_telefone'], $input['parceiro_regiao']]);
     
        Session::flash('flash_message', 'Cadastrado com sucesso!');
        return redirect()->back();
    }

    public function listar_js($regiao=null,$parceiro=null)
    {
        $query = DB::table('parceiros_view');

        $data = array();
        if(isset($regiao) && $regiao != 'vazio')
        {
            $query->where('regiao','=',$regiao);
        }
        if(isset($parceiro))
        {
            $query->where('nome','like',$parceiro);
        }

        $resul = $query->get();
        $result = array();
        foreach($resul as $data)
        {
            $result[] = ['id'=>$data->id,'nome'=>$data->nome,'telefone'=>$data->telefone,'regiao'=>$data->regiao];
        }
        return Response::json($result);
    }

    public function excluir($parceiro)
    {
        DB::table('parceiro')->where('id','=',$parceiro)->delete();
        
        Session::flash('flash_message', 'Deletado com sucesso!');
        return redirect()->back();

    }

    public function show()
    {
        $query = DB::table('regiao')->get();
        $string = null;
        foreach ($query as $info)
        {
            $string .= "<option value='" . $info->Nome . "'>" . $info->Nome . "</option>\r\n";
        }
        return view('listar')->withOpcoes($string);
    }

    public function autocomplete()
    {
        $tem = Input::get('term');

        $result = array();

        $queries = DB::table('regiao')->where('Nome','LIKE','%'.$tem.'%')->take(5)->get();

        foreach ($queries as $data)
        {
            $result[] = ['value'=>$data->Nome];
        }
        return Response::json($result);
    }

    public function gerenciar()
    {
        $query = DB::table('parceiros_view')->get();
        $resul = array();

        foreach($query as $data)
        {
            $resul[] = ['id'=>$data->id,'nome'=>$data->nome,'telefone'=>$data->telefone,'regiao'=>$data->regiao];
        }
        return view('gerenciar')->withparceiros($resul);
    }

    public function editar_js($parceiro)
    {
        $data = DB::table('parceiros_view')->where('id','=',$parceiro)->first();
        $result = array();
        $result['nome'] = $data->nome;
        $result['telefone'] = $data->telefone;
        $result['regiao'] = $data->regiao;
        return Response::json($result);
    }

    public function update(Request $request)
    {
        $input = $request->all();
        $input['parceiro_regiao'] = $this->cadastrarRegiao($input['parceiro_regiao']);
        DB::insert('update parceiro set Nome = ?,Telefone = ?,Regiao = ? where id = ?',[$input['parceiro_nome'],$input['parceiro_telefone'], $input['parceiro_regiao'],$input['parceiro_id']]);
        Session::flash('flash_message', 'Editado com sucesso!');
        return redirect()->back();
    }

    private function cadastrarRegiao($regiao)
    {
        $query = DB::table('regiao')->where('Nome','like',$regiao)->get();
        if(!empty($query) && $query[0]->Nome == $regiao)
        {
            return $query[0]->id;
        }
        else
        {
            DB::insert('insert into regiao(nome) value(?)',[$regiao]);
            return $this->cadastrarRegiao($regiao);
        }
    }
}

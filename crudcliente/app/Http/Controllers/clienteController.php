<?php

namespace App\Http\Controllers;

use App\clienteModel;
use Dotenv\Validator;
use Illuminate\Http\Request;

class clienteController extends Controller
{
    //
    /** Adiciona o Cliente no banco de dadoos */
    public function store(Request $request)
    {

        /** @var  $rules
         * Regras do Request
         */
        $rules = array(
            "Nome"=> 'required|max:255',
            "CGC" => 'nullable|min:11',
            "Email"=> 'required|email',
            'Contato'=> 'required|number'
        );

        /** @var Validator $validacao */
        $validacao = $this->validate($request,$rules);

        /** Retorna para a pagina de cadastro com o erro */
        if($validacao->fails())
        {
            return redirect('/cadastro')
                ->withErrors($validacao)
                ->withInput();
        }

        /** @var clienteModel $model
         *  Adiciona o Model: Cliente no banco de dados
         */
        $model = new clienteModel();
        $model->Nome = $request->Nome;
        $model->CGC = $request->CGC;
        $model->DtNascimento = date_format(date_create($request->DtNascimento), "Y-m-d");
        $model->Email = $request->Email;
        $model->Contato = $request->Contato;
        $model->save();
        return redirect("/");
    }

    /** Pagina Principal */
    public function index()
    {
        $data["lista"] = clienteModel::all();
        return view("desafio1/principal", $data);
    }

    /** Pagina de Cadastro */
    public function cadastro()
    {
        return view("desafio1/cadastro");
    }

    /** Pagina de Edição de Cliente
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data["id"] = $id;
        $data["cliente"] = clienteModel::find($id);
        return view("desafio1/editar", $data);
    }

    /** Update Model clienteModel no banco de dados */
    public function update(Request $request, $id)
    {
        /** @var  $rules
         * Regras do Request
         */
        $rules = array(
            "Nome"=> 'required|max:255',
            "CGC" => 'nullable|min:11',
            "Email"=> 'required|email',
            'Contato'=> 'required|number'
        );

        /** @var Validator $validacao */
        $validacao = $this->validate($request,$rules);

        /** Retorna para a pagina de cadastro com o erro */
        if($validacao->fails())
        {
            return redirect('/cadastro')
                ->withErrors($validacao)
                ->withInput();
        }

        /** @var clienteModel $model
         *  Atualiza as informações do Cliente no Banco de dados
         */
        $model = clienteModel::find($id);
        $model->Nome = $request->Nome;
        $model->CGC = $request->CGC;
        $DtNascimento = strtotime($request->DtNascimento);
        $model->DtNascimento = date("Y-m-d",$DtNascimento);
        $model->Email = $request->Email;
        $model->Contato = $request->Contato;
        $model->save();
        return redirect("/");
    }

    /** Deleta o Cliente no banco de dados */
    public function destroy($id)
    {
        $cliente = clienteModel::find($id);
        $cliente->delete();
        return redirect("/");
    }
}


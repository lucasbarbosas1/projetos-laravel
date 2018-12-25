<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class desafio2Controller extends Controller
{
    //

    private $todas = array();

    public function index()
    {

        return view("desafio2/principal");
        $teste = "DANIEL";
        $this->Anagrama($teste,0,strlen($teste));
        echo "<br>".count($this->todas);
    }

    public function gerar(Request $request)
    {
        $temp = $request->Palavra;
        $this->Anagrama($temp,0,strlen($temp));
        $data["lista"] = $this->todas;
        return view("desafio2/principal",$data);
    }

    /**
     * @param $palavra
     * @param $posicao
     * @param $tamanho
     *  Realiza o Anagrama da palavra e adiciona no Array
     */
    public function Anagrama($palavra, $posicao, $tamanho){
        if($posicao < $tamanho)
        {
            for($j = $posicao;$j<$tamanho;$j++)
            {
                if($j == $posicao || $palavra[$j] != $palavra[$posicao])
                {
                    $temp = $palavra[$j];
                    $palavra[$j] = $palavra[$posicao];
                    $palavra[$posicao] = $temp;
                    $this->Anagrama($palavra,$posicao+1,$tamanho);
                }
            }
        }
        else
        {
            if(!in_array($palavra,$this->todas))
                array_push($this->todas,$palavra);
        }
    }
}
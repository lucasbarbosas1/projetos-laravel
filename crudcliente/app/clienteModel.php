<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clienteModel extends Model
{
    //

    protected $table = "cliente";

    protected $fillable =["Nome","CGC","Contato","Email","DtNascimento"];

}

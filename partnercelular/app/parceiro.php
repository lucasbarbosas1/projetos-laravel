<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parceiro extends Model
{
    protected $fillable = [
        'nome',
        'telefone',
        'regiao'
    ];
}

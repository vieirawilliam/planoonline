<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    
    protected $connection = "sqlite";

    protected $fillable = [
        'cliente_name', 'cliente_unidade_nome', 'cliente_email','cliente_ip','cliente_porta','cliente_tabela', 'cliente_unidade'
    ];
}

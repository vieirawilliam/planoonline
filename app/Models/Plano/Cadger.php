<?php

namespace App\Models\Plano;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Cadger extends Model
{
    protected $table = 'cadger';

    public static function ListaCadger()
    {
        $data = Cadger::all();
        
        return $data;
    }
}

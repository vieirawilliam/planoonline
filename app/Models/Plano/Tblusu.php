<?php

namespace App\Models\Plano;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tblusu extends Authenticatable
{
    
    

    protected $table = 'tblusu';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usucod','usunome', 'ususenha','nome','situacao','status','codger','id_codger'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'ususenha', 'remember_token',
    ];

    protected $password = 'ususenha';

    public function getAuthPassword()
    {
        return $this->ususenha;
    }

    public static function ListaUsuarios($paginate)
    {
        $data = DB::table('tblusu')
                        ->join('cadger','cadger.id','tblusu.id_codger')
                        ->select('tblusu.id','tblusu.usucod','tblusu.usunome','tblusu.nome','tblusu.situacao','tblusu.status','nomeger')
                        ->orderBy('tblusu.usucod','desc')
                        ->paginate($paginate);
        
        return $data;
    }
}

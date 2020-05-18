<?php

namespace App\Models\Plano;

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
        'usucod','usunome', 'ususenha','nome','situacao','status'
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
}

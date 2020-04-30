<?php

namespace App\Models\Plano;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Tblusu extends Authenticatable
{
    
    

    protected $table = 'tblusu';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'usunome', 'ususenha',
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

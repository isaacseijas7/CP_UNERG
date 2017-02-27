<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [
        'email', 'password','persona_id','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }

    public function admin()
    {
        return $this->type === 'Admin';
    }

    public function empresa()
    {
        return $this->type === 'Empresa';
    }

    public function pasante()
    {
        return $this->type === 'Pasante';
    }

    public function empresarial()
    {
        return $this->type === 'Tutor Empresarial';
    }

    public function academico()
    {
        return $this->type === 'Tutor Academico';
    }

    public function perfilPasante(){
        return $this;
    }

    
    
}

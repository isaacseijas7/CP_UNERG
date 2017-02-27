<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{

	protected $table = 'personas';

    protected $fillable = [
        'cedula', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'genero', 'fecha_nacimento', 'telefono_uno', 'telefono_dos', 'direccion'
    ];

    public function usuario()
    {
        return $this->hasOne(User::class);
    }

    public function pasante()
    {
        return $this->hasOne(Pasante::class);
    }

    public function tutorAcademico()
    {
        return $this->hasOne(TutorAcademico::class);
    }

    public function tutorEmpresarial()
    {
        return $this->hasOne(TutorEmpresarial::class);
    }
}

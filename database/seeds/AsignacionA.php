<?php

use Illuminate\Database\Seeder;

use App\Pasante;
use App\AsignacionAcademica;
use App\TutorAcademico;
use Faker\Factory as Faker;


class AsignacionA extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $pasantes = Pasante::all();

        $pasantes->each(function($pasantes, $faker){
	        $tutor = TutorAcademico::all();
	        $num = count($tutor);
	        $pasantes->tutor_estado = 'si';
	        $pasantes->save();
        	$asignacion = AsignacionAcademica::create([
	            'tutores_a_id' => rand(1, $num),
	            'pasante_id' => $pasantes->id
	        ]);

        });

    }
}

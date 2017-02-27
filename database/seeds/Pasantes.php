<?php

use Illuminate\Database\Seeder;

use App\Persona;
use App\User;
use App\Pasante;
use App\CronogramaPasantia;
use Faker\Factory as Faker;

class Pasantes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $cronograma = CronogramaPasantia::where('estado', '=', 'activo' )->get()[0];

        for ($i=0; $i < 30; $i++) { 
            # code...
            $persona = Persona::create([
                'cedula' => rand(1111111,99999999), 
                'primer_nombre' => $faker->firstName,
                'segundo_nombre' => $faker->firstName,
                'primer_apellido' => $faker->lastName,
                'segundo_apellido' => $faker->lastName,
                'genero' => $faker->randomElement(['Masculino', 'Femenino']),
                'fecha_nacimento' => $faker->dateTimeBetween('-35 years', '-15 years')->format('Y-m-d'),
                'telefono_uno' => '04167362763',
                'telefono_dos' => '04123907297',
                'direccion' => 'por alli'
            ]);

            $user = User::create([
                'email' => "pas_".$faker->safeEmail,
                'persona_id' => $persona->id,
                'password' => bcrypt('qwerty'),
                'type' => 'Pasante'
            ]);


            $pasante = Pasante::create([
                'periodo_academico' => $cronograma->periodo,
                'email_alternativo' => $faker->safeEmail,
                'zurdo' => $faker->randomElement(['si', 'no']),
                'grupo_sanguineo' => $faker->randomElement(['NO SABE / NO CONTESTA', 'AB +', 'AB -', 'A +', 'A -', 'B +', 'B -', 'O +', 'O -']),
                'alergias' => $faker->randomElement(['', 'al polvo', 'a los olores fuertes']),
                'idiomas' => $faker->randomElement(['', 'italiano', 'ingles']),
                'lugar_nacimiento' => $faker->randomElement(['san juan', 'maracay', 'caracas']),
                'cursos_habilidades' => $faker->randomElement(['programacion', 'diseño', 'app moviles']),
                'persona_id' => $persona->id,
            ]);
           
        }

    }
}

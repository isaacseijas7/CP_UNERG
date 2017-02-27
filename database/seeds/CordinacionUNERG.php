<?php

use Illuminate\Database\Seeder;

use App\Persona;
use App\User;
use App\TutorAcademico;
use Faker\Factory as Faker;

class CordinacionUNERG extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
        $faker = Faker::create();

        $persona = Persona::create([
            'cedula' => '77777777', 
            'primer_nombre' => 'admin',
            'segundo_nombre' => 'admin',
            'primer_apellido' => 'root',
            'segundo_apellido' => 'root',
            'genero' => 'Masculino',
            'fecha_nacimento' => '2016-11-30',
            'telefono_uno' => '04243466689  ',
            'telefono_dos' => '04123907297',
            'direccion' => 'por alli' 
        ]);

        $user = User::create([
            'email' => 'admin@admin.com',
            'persona_id' => $persona->id,
            'password' => bcrypt('qwerty'),
            'type' => 'Admin'
        ]);

        //Tutores Academicos
        for ($i=0; $i < 5; $i++) { 
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
                'email' => $faker->safeEmail,
                'persona_id' => $persona->id,
                'password' => bcrypt('qwerty'),
                'type' => 'Tutor Academico'
            ]);

            $pasante = TutorAcademico::create([
                'persona_id' => $persona->id
            ]);
           
        }

    }
}

<?php

use Illuminate\Database\Seeder;

use App\Empresa;
use App\Persona;
use App\User;
use App\TutorEmpresarial;
use Faker\Factory as Faker;

class Empresas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();


        for ($i=0; $i < 5; $i++) { 
            $persona = Persona::create([
                'cedula' =>'j-'.rand(1111111,99999999).'-4', 
                'primer_nombre' => "emp_".$faker->company,
                'telefono_uno' => '02467300928',
            ]);

            $user = User::create([
                'email' => "emp_".$faker->companyEmail,
                'persona_id' => $persona->id,
                'password' => bcrypt('qwerty'),
                'type' => 'Empresa'
            ]);

            $empresa = Empresa::create([

                'rif' => 'j-'.rand(1111111,99999999).'-4',  
                'nombre_razon' => $persona->primer_nombre, 
                'correo' => $user->email, 
                'telefono' => '02467300928',
                'direccion' => 'por alli', 
                'pagina_web' => 'http://www.' . $faker->domainName, 
                'descripcion' => 'desarrollo de software', 
                'user_id' => $user->id,
                
            ]);
            
        }


        //Tutores empresariales


        $empresas = Empresa::all();

        for ($i=0; $i < 10; $i++) { 
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
                'type' => 'Tutor Empresarial'
            ]);

            $pasante = TutorEmpresarial::create([
                'persona_id' => $persona->id,
                'empresa_id' => rand(1, 5),
                'cargo' => 'Jefe de proyectos',
                'departamento' => 'informatica',
                'profesion' => 'programador',
            ]);
           
        }

    }
}

<?php

use Illuminate\Database\Seeder;

use App\Empresa;
use App\SolicitudPasantes;
use Faker\Factory as Faker;

class Solicitud extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $empresas = Empresa::all();

        $empresas->each(function($empresas, $faker){
	        
	        $solicitud = SolicitudPasantes::create([
	            'cantidad' => rand(1, 5),
	            'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint minus enim delectus ab, deleniti est neque. Nulla maiores nemo magnam.',
	            'status' => 'Pendiente',
	            'empresa_id' => $empresas->id
	        ]);
            
        });

    }
}

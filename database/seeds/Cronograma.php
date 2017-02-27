<?php

use Illuminate\Database\Seeder;

use App\CronogramaPasantia;
use Faker\Factory as Faker;

class Cronograma extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $cronograma = CronogramaPasantia::create([
            'periodo' => '2017-I',
            'primera_charla' => '2017-04-04',
            'segunda_charla' => '2017-04-06',
            'ini_pasantias' => '2017-04-08',
            'entrega_req_inic' => '2017-04-22',
            'primera_visita' => '2017-05-20',
            'reasignacion' => '2017-05-27',
            'culminacion_pasantias' => '2017-06-24',
            'segunda_visita' => '2017-06-05',
            'desde_entrega_req_fina' => '2017-06-27',
            'hasta_entrega_req_fina' => '2017-07-01',
            'desde_presentacion_oral' => '2017-07-04',
            'hasta_presentacion_oral' => '2017-07-15',
            'carga_notas' => '2017-07-22'
        ]);
        
    }
}

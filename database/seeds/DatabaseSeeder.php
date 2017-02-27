<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $this->call(CordinacionUNERG::class);
       $this->call(Cronograma::class);
       $this->call(Empresas::class);
       $this->call(Pasantes::class);
       $this->call(Solicitud::class);
       $this->call(AsignacionA::class);
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCronogramasPasantiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cronogramas_pasantias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('periodo');
            $table->date('primera_charla');
            $table->date('segunda_charla');
            $table->date('ini_pasantias');
            $table->date('entrega_req_inic');
            $table->date('primera_visita');
            $table->date('reasignacion');
            $table->date('segunda_visita');
            $table->date('culminacion_pasantias');
            $table->date('desde_entrega_req_fina');
            $table->date('hasta_entrega_req_fina');
            $table->date('desde_presentacion_oral');
            $table->date('hasta_presentacion_oral');
            $table->date('carga_notas');
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cronogramas_pasantias');
    }
}

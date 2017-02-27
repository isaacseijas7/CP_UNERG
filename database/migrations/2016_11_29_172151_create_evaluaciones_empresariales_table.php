<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionesEmpresarialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones_empresariales', function (Blueprint $table) {
            $table->increments('id');

            $table->float('nota');

            /*$table->float('aspenco_uno');
            $table->float('aspenco_dos');
            $table->float('aspenco_tres');
            $table->float('aspenco_cuatro');
            $table->float('aspenco_cinco');
            $table->float('aspenco_seis');
            $table->float('aspenco_siete');
            $table->float('aspenco_ocho');
            $table->float('aspenco_nueve');
            $table->float('aspenco_dies');*/


            $table->integer('asignacion_id')->unsigned();
            $table->foreign('asignacion_id')->references('id')->on('asignacion_empresarial')->onDelete('cascade');

            $table->timestamps();
        });



        Schema::create('evaluaciones_coordinacio', function (Blueprint $table) {
            $table->increments('id');
            $table->float('nota_academica');
            $table->float('nota_empresarial');
            $table->float('nota_charla');
            $table->float('nota_req');
            $table->float('nota_informe');
            $table->float('nota_defensa');
            $table->enum('status', ['APROBADO', 'REPROBADO'])->default('APROBADO');
            $table->integer('pasantes_id')->unsigned();
            $table->foreign('pasantes_id')->references('id')->on('pasantes')->onDelete('cascade');

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
        Schema::drop('evaluaciones_empresariales');
    }
}

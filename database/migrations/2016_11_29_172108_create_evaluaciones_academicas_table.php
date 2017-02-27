<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluacionesAcademicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciones_academicas', function (Blueprint $table) {
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
            $table->foreign('asignacion_id')->references('id')->on('asignacion_academica')->onDelete('cascade');

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
        Schema::drop('evaluaciones_academicas');
    }
}

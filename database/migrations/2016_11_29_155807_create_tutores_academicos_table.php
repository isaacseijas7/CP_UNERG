<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutoresAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutores_academicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_id')->unsigned();

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('asignacion_academica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pasante_id')->unsigned();
            $table->integer('tutores_a_id')->unsigned();
            $table->enum('estado_nota', ['no_cargada', 'cargada'])->default('no_cargada');

            $table->foreign('pasante_id')->references('id')->on('pasantes')->onDelete('cascade');
            $table->foreign('tutores_a_id')->references('id')->on('tutores_academicos')->onDelete('cascade');

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
        Schema::drop('tutores_academicos');
    }
}

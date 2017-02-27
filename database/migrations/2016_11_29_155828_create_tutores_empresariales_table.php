<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutoresEmpresarialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutores_empresariales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cargo');
            $table->string('departamento');
            $table->string('profesion');
            $table->integer('persona_id')->unsigned();
            $table->integer('empresa_id')->unsigned();

            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');
            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
            
            $table->timestamps();
        });

        Schema::create('asignacion_empresarial', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pasante_id')->unsigned();
            $table->integer('tutores_e_id')->unsigned();
            $table->enum('estado_nota', ['no_cargada', 'cargada'])->default('no_cargada');

            $table->foreign('pasante_id')->references('id')->on('pasantes')->onDelete('cascade');
            $table->foreign('tutores_e_id')->references('id')->on('tutores_empresariales')->onDelete('cascade');

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
        Schema::drop('tutores_empresariales');
    }
}

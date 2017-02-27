<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('periodo_academico');
            $table->string('zurdo');
            $table->string('alergias');
            $table->enum('grupo_sanguineo', ['NO SABE / NO CONTESTA', 'AB +', 'AB -', 'A +', 'A -', 'B +', 'B -', 'O +', 'O -']);
            $table->string('idiomas');
            $table->string('nombre_empresa');
            $table->text('cursos_habilidades');
            $table->text('lugar_nacimiento');
            $table->string('email_alternativo');
            $table->enum('estado', ['activo', 'inactivo'])->default('inactivo');
            $table->enum('tutor_estado', ['no', 'si'])->default('no');
            $table->enum('evaluado', ['si', 'no'])->default('no');
            $table->integer('persona_id')->unsigned();

            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('postulaciones_pasantes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pasante_id')->unsigned();
            $table->foreign('pasante_id')->references('id')->on('pasantes')->onDelete('cascade');
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

            $table->enum('status', ['Pendiente', 'Aceptada', 'Rechasada','Confirmada']);

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
        Schema::drop('pasantes');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('actividad');
            $table->integer('pasante_id')->unsigned();
            $table->integer('tutor_id')->unsigned();
            $table->enum('status', ['Pendiente', 'Finalizada'])->default('Pendiente');
            $table->foreign('pasante_id')->references('id')->on('pasantes')->onDelete('cascade');
            $table->foreign('tutor_id')->references('id')->on('tutores_empresariales')->onDelete('cascade');
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
        Schema::drop('actividades');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rif')->unique();
            $table->string('nombre_razon');
            $table->string('correo')->unique();
            $table->string('telefono');
            $table->string('direccion');
            $table->string('pagina_web');
            $table->string('descripcion');
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('sulicitudes_pasantes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cantidad');
            $table->string('descripcion');
            $table->enum('status', ['Pendiente', 'Finalizada']);
            $table->integer('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas')->onDelete('cascade');

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
        Schema::drop('empresas');
    }
}

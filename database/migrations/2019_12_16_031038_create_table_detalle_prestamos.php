<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDetallePrestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallePrestamos', function (Blueprint $table) {
            $table->bigIncrements('idPrestamoDetalle');
            $table->bigInteger('idPrestamo')->unsigned();
            $table->foreign('idPrestamo')->references('idPrestamo')->on('prestamos');
            $table->bigInteger('idActivo')->unsigned();
            $table->foreign('idActivo')->references('idActivo')->on('activos');
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
        Schema::dropIfExists('detallePrestamos');
    }
}

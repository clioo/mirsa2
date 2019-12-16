<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePrestamos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestamos', function (Blueprint $table) {
            $table->bigIncrements('idPrestamo');
            $table->string('cicloEscolar', 45);
            $table->dateTime('fechaPrestamo');
            $table->string('grupo', 5);
            $table->string('carrera', 25);
            $table->string('uidAlumno', 30);
            $table->string('nombreAlumno', 45);
            $table->dateTime('fechaEntrega');
            $table->string('tipoIdentificacion', 25);
            $table->string('responsablePrestamo', 45);
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
        Schema::dropIfExists('prestamos');
    }
}

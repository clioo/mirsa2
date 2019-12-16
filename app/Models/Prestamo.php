<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = ['cicloEscolar', 'fechaPrestamo', 'grupo', 'carrera', 'uidAlumno', 'nombreAlumno', 'fechaEntrega', 'tipoIdentificacion', 'responsablePrestamo'];
    protected $primaryKey = 'idPrestamo';

    public function detallePrestamo(){
        return $this->hasMany(DetallePrestamo::class, 'idPrestamo', 'idPrestamo');
    }
}

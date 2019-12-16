<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePrestamo extends Model
{
    protected $primaryKey = 'idPrestamoDetalle';
    protected $table = 'detalleprestamos';
    protected $fillable = ['idPrestamo', 'idActivo'];

    public function activos(){
        return $this->belongsTo(Activo::class);
    }

    public function prestamos(){
        return $this->belongsTo(Prestamo::class);
    }
}

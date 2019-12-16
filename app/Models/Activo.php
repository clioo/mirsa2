<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $fillable = ['codigoBarras', 'nombreActivo'];
    protected $primaryKey = 'idActivo';

    public function detallePrestamo(){
        return $this->hasMany('detallePrestamo', 'idActivo', 'idActivo');
    }

}

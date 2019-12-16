<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestamo;
use App\Models\DetallePrestamo;

class PrestamoController extends Controller
{
    public function create(Request $request){
        $this->validate($request, [
            'cicloEscolar' => 'required|max:45',
            'fechaPrestamo' => 'required|date',
            'grupo' => 'required|max:5',
            'carrera' => 'required|max:25',
            'uidAlumno' => 'required|max:30',
            'nombreAlumno' => 'required|max:45',
            'fechaEntrega' => 'required|date',
            'tipoIdentificacion' => 'required|max:25',
            'responsablePrestamo' => 'required|max:45',
            'activos' => 'array'
        ]);
        //Crear objetos DetallePrestamo
        $prestamo = Prestamo::create($request->all());
        self::saveDetallePrestamo($prestamo, $request->activos == null ? [] : $request->activos);
        return response()->json($prestamo, 201);
    }

    public function update(Request $request, $idPrestamo){
        $prestamo = Prestamo::findOrFail($idPrestamo);
        $prestamo->update($request->all());
        //Crear objetos DetallePrestam
        self::saveDetallePrestamo($prestamo, $request->activos == null ? [] : $request->activos);
        return response()->json($prestamo, 200);
    }

    public function show($idPrestamo){
        return response()->json(Prestamo::with('detallePrestamo.activos')->find($idPrestamo));
    }

    public function delete($idPrestamo){
        $prestamo = Prestamo::find($idPrestamo);
        if(!$prestamo)
           return response()->json('Not found', 404);
        $prestamo->delete();
        return response('Deleted Successfully', 200);
    }

    private function saveDetallePrestamo($prestamo, $activoIds){
        $prestamo->detallePrestamo()->delete();
        foreach($activoIds as $idActivo){
            DetallePrestamo::create([
                'idPrestamo' => $prestamo->idPrestamo,
                'idActivo' => $idActivo
            ]);
        }
    }
}

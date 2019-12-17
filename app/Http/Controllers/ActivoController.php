<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activo;

class ActivoController extends Controller
{
    public function create(Request $request){
        $this->validate($request, [
            'codigoBarras' => 'required|max:45|unique:activos',
            'nombreActivo' => 'required|max:30'
        ]);
        $activo = Activo::create($request->all());
        return response()->json($activo, 201);
    }

    public function update(Request $request, $idActivo){
        $activo = Activo::findOrFail($idActivo);
        $activo->update($request->all());
        return response()->json($activo, 200);
    }

    public function show($idActivo){
        return response()->json(Activo::find($idActivo));
    }

    public function getall(){
        return response()->json(Activo::all());
    }

    public function delete($idActivo){
        $activo = Activo::find($idActivo);
        if(!$activo)
           return response()->json('Not found', 404);
        $activo->delete();
        return response('Deleted Successfully', 200);
    }
}

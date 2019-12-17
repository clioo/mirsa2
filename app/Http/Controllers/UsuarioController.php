<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UsuarioController extends Controller
{
    public function create(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
        $user = new user($request->all());
        $user->password = app('hash')->make($request->password);

        return response()->json($user, 201);
    }

    public function update(Request $request, $idUser){
        $user = User::findOrFail($idUser);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function show($idUser){
        return response()->json(User::find($idUser));
    }

    public function getall(){
        return response()->json(User::all());
    }

    public function getusuario($email, $password){
        return response()->json(User::where('email', '=', $email)
                                    ->where('password', '=', $password)
                                    ->get());
    }

    public function delete($idUser){
        $user = User::find($idUser);
        if(!$user)
            return response()->json('Not found', 404);
        $user->delete();
        return response('Deleted Successfully', 200);
    }

}

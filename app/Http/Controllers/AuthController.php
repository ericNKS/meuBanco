<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Authentica o usuario
     *
     * @return 
     */
    public function login(Request $request)
    {
        $usuario = $request->all(['email', 'password']);
        $token = auth('api')->attempt($usuario);

        if($token){
            return response()->json(['token'=> $token], 200);
        } else{
            return response()->json(['Erro'=> 'O email ou senha invalido'], 403);
        }
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrarUsuario()
    {
        $usuario = auth()->user();
        if($usuario){
            return response()->json(['usuario' => $usuario], 200);
        } else{
            return response()->json(['erro', 'Usuario inválido'], 403);
        }
    }
}

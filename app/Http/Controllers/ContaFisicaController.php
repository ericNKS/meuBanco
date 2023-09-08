<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ContaFisicaController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $usuario = [
                'name' => $request->name,
                'email' => $request->email,
                'cpf/cnpj' => $request->cpf,
                'password' => bcrypt($request->password)
            ];
            $cliente = User::create($usuario);
            return Response()->json(['Success' => $cliente], 200);
        } catch (\Throwable $th) {
            return Response()->json(['erro'=> $th], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return response()->json(['usuario' => auth()->user()], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

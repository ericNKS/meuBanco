<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContaJuridicaController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function criarContaJuridica(Request $request)
    {
        try {
            $usuario = [
                'name' => $request->name,
                'email' => $request->email,
                'cpf/cnpj' => $request->cnpj,
                'password' => bcrypt($request->password),
                'isJuridico' => true,
            ];
            $cliente = User::create($usuario);
            return Response()->json(['Success' => $cliente], 200);
        } catch (\Throwable $th) {
            return Response()->json(['erro'=> $th], 400);
        }
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
        //
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

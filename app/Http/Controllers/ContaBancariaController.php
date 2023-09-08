<?php

namespace App\Http\Controllers;

use App\Models\ContaBancaria;
use Illuminate\Http\Request;

class ContaBancariaController extends Controller
{
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function transferencia(Request $request)
    {
        $usuario = auth()->user();
        $conta_beneficiado = $request->conta;
        $agencia_beneficiado = $request->agencia;
        $usuario_beneficiado = ContaBancaria::where('conta', $conta_beneficiado)->where('agencia', $agencia_beneficiado)->get();
        if (count($usuario_beneficiado) != 0) {
            if ($usuario->conta_bancaria->conta == $usuario_beneficiado->conta) {
                return response()->json(['erro'=> 'Nao pode fazer transferencia para voce mesmo'], 401);
            }
            return response()->json(['usuario_beneficiado'=> $usuario], 200);
        } else {
            return response()->json(['erro'=> "Usuario nao foi encontrado"], 404);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

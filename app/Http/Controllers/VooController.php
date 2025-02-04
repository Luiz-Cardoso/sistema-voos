<?php

namespace App\Http\Controllers;

use App\Models\Voo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VooController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Voo::all(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero_voo' => 'required|unique:voos|string|max:10',
            'origem' => 'required|string|max:100',
            'destino' => 'required|string|max:100',
            'data_voo' => 'required|date',
            'horario' => 'required',
            'status' => 'required|in:previsto,cancelado,atrasado,concluido'
        ]);

        $voo = Voo::created($request->all());
        return response()->json($voo, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $voo = Voo::find($id);
        if(!$voo){
            return response()->json(['message' => 'Voo não encontrado'], Response::HTTP_NOT_FOUND);
        }
        return response()->json($voo, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $voo = Voo::find($id);
        if(!$voo){
            return response()->json(['message' => 'Voo não encontrado'], Response::HTTP_NOT_FOUND);
        }
        
        $request->validate([
            'numero_voo' => 'sometimes|string|max:10|unique:voos,numero_voo,' . $id,
            'origem' => 'sometimes|string|max:100',
            'destino' => 'sometimes|string|max:100',
            'data_voo' => 'sometimes|date',
            'horario' => 'sometimes',
            'status' => 'sometimes|in:previsto,cancelado,atrasado,concluido'
        ]);

        $voo->update($request->all());
        return response()->json($voo, Response::HTTP_OK);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $voo = Voo::find($id);
        if(!$voo){
            return response()->json(['message' => 'Voo não encontrado'], Response::HTTP_NOT_FOUND);
        }

        $voo->delete();
        return response()->json(['message' => 'Voo removido com sucesso'], Response::HTTP_OK);
    }
}

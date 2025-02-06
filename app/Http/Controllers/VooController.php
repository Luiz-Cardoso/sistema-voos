<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voo;

class VooController extends Controller
{
    public function index()
    {
        return response()->json(Voo::all(), 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_voo' => 'required|string|max:10',
            'origem' => 'required|string|max:100',
            'destino' => 'required|string|max:100',
            'data_voo' => 'required|date',
            'horario' => 'required|date_format:H:i',
            'status' => 'required|string|max:20',
        ]);

        $voo = Voo::create($request->all());

        return response()->json($voo, 201);
    }

    public function show($id)
    {
        $voo = Voo::find($id);

        if (!$voo) {
            return response()->json(['error' => 'Voo não encontrado'], 404);
        }

        return response()->json($voo, 200);
    }

    public function update(Request $request, $id)
    {
        $voo = Voo::find($id);

        if (!$voo) {
            return response()->json(['error' => 'Voo não encontrado'], 404);
        }

        $request->validate([
            'numero_voo' => 'string|max:10',
            'origem' => 'string|max:100',
            'destino' => 'string|max:100',
            'data_voo' => 'date',
            'horario' => 'date_format:H:i',
            'status' => 'string|max:20',
        ]);

        $voo->update($request->all());

        return response()->json($voo, 200);
    }

    public function destroy($id)
    {
        $voo = Voo::find($id);

        if (!$voo) {
            return response()->json(['error' => 'Voo não encontrado'], 404);
        }

        $voo->delete();

        return response()->json(['message' => 'Voo excluído com sucesso'], 200);
    }
}

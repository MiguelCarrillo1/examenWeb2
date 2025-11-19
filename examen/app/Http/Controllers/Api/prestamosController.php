<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestramos;


class prestamosController extends Controller
{
    public function index()
    {
        return prestramos::all();

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'libro_id' => 'required|integer|exists:libros,id',
        ]);

        $prestamo = prestramos::create($data);
        return response()->json($prestamo, 201);
    }

    public function show($id)
    {
        $prestamo = prestramos::find($id);
        if (is_null($prestamo)) {
            return response()->json(['message' => 'Préstamo no encontrado'], 404);
        }
        return response()->json($prestamo);
    }

    public function update(Request $request, $id)
    {
        $prestamo = prestramos::find($id);
        if (is_null($prestamo)) {
            return response()->json(['message' => 'Préstamo no encontrado'], 404);
        }

        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'fecha_prestamo' => 'sometimes|required|date',
            'fecha_devolucion' => 'sometimes|required|date',
            'libro_id' => 'sometimes|required|integer|exists:libros,id',
        ]);

        $prestamo->update($data);
        return response()->json($prestamo);
    }

    public function destroy($id)
    {
        $prestamo = prestramos::find($id);
        if (is_null($prestamo)) {
            return response()->json(['message' => 'Préstamo no encontrado'], 404);
        }
        $prestamo->delete();
        return response()->json(['message' => 'Préstamo eliminado']);
    }
}

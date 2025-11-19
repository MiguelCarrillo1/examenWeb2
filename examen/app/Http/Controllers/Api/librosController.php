<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\libros;


class librosController extends Controller
{
    public function index()
    {
        return libros::query()
        ->withCount('Libros')
        ->orderBy('id','desc')
        ->paginate(10);
    }

    public function store (Request $request)
    {
        //
        $data = $request->validate([
            'titulo' => 'required|string|max:255',
            'anio_publicacion' => 'required|integer',
            'genero' => 'required|string|max:255',
            'autor_id' => 'required|integer',
        ]);
        $libros = libros::create($request->all());
        return response()->json($libros, 201);
    }

    public function show($id)
    {
        //
        $libros = libros::find($id);
        if (is_null($libros)) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }
        return response()->json($libros);
    }

    public function update(Request $request, $id)
    {
        //
        $libros = libros::find($id);
        if (is_null($libros)) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }
        $data = $request->validate([
            'titulo' => 'sometimes|required|string|max:255',
            'anio_publicacion' => 'sometimes|required|integer',
            'genero' => 'sometimes|required|string|max:255',
            'autor_id' => 'sometimes|required|integer',
        ]);
        $libros->update($data);
        return response()->json($libros);
    }

    public function destroy($id)
    {
        //
        $libros = libros::find($id);
        if (is_null($libros)) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }
        $libros->delete();
        return response()->json(null, 204);
    }
}

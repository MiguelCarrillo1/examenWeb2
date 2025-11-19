<?php

namespace App\Http\Controllers;
    use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\autores;

class autoresController extends Controller
{
        public function index()
    {
        //
        return Autore::query()
        ->withCount('Autores')
        ->orderBy('id','desc')
        ->paginate(10);
    }


    public function store (Request $request)
    {
        //
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'nacionalidad' => 'required|string|max:255',
        ]);
        $autores = autores::create($request->all());
        return response()->json($autores, 201);
    }


    public function show($id)
    {
        //
        $autores = autores::find($id);
        if (is_null($autores)) {
            return response()->json(['message' => 'Autor no encontrado'], 404);
        }
        return response()->json($autores);
    }


    public function update(Request $request, $id)
    {
        //
        $autores = autores::find($id);
        if (is_null($autores)) {
            return response()->json(['message' => 'Autor no encontrado'], 404);
        }
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'nacionalidad' => 'sometimes|required|string|max:255',
        ]);
        $autores->update($data);
        return response()->json($autores);
    }

    public function destroy($id)
    {
        //
        $autores = autores::find($id);
        if (is_null($autores)) {
            return response()->json(['message' => 'Autor no encontrado'], 404);
        }
        $autores->delete();
        return response()->json(['message' => 'Autor eliminado correctamente']);
    }

}

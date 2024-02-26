<?php

namespace App\Http\Controllers;
use App\Models\Aviso;
use Illuminate\Http\Request;

class AvisoController extends Controller
{
    public function index()
    {
        $avisos = Aviso::all();
        return response()->json($avisos);
    }

    public function store(Request $request)
    {
        $aviso = Aviso::create($request->all());
        return response()->json($aviso, 201);
    }

    public function show(Aviso $aviso)
    {
        return response()->json($aviso);
    }

    public function update(Request $request, Aviso $aviso)
    {
        $aviso->update($request->all());
        return response()->json($aviso);
    }

    public function destroy(Aviso $aviso)
    {
        $aviso->delete();
        return response()->json(null, 204);
    }
}


<?php

namespace App\Http\Controllers;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        try {
            $colores = Color::all();
            return response()->json($colores);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        $color = Color::create($request->all());
        return response()->json($color, 201);
    }

    public function show(Color $color)
    {
        return response()->json($color);
    }

    public function update(Request $request, Color $color)
    {
        $color->update($request->all());
        return response()->json($color);
    }

    public function destroy(Color $color)
    {
        $color->delete();
        return response()->json(null, 204);
    }
}

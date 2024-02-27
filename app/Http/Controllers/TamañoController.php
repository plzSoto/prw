<?php

namespace App\Http\Controllers;
use App\Models\Tamaño;
use Illuminate\Http\Request;

class TamañoController extends Controller
{
    public function index()
    {
        try {
            $tamaños = Tamaño::all();
            return response()->json($tamaños);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

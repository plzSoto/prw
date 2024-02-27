<?php

namespace App\Http\Controllers;
use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    public function index()
    {
        try {
            $especies = Especie::all();
            return response()->json($especies);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

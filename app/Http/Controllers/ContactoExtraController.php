<?php

namespace App\Http\Controllers;
use App\Models\Contactoextra;
use Illuminate\Http\Request;

class ContactoExtraController extends Controller
{
    public function index()
    {
        try {
            $contactosextras = Contactoextra::all();
            return response()->json($contactosextras);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    public function store(Request $request)
    {
        $contactoextra = Contactoextra::create($request->all());
        return response()->json($contactoextra, 201);
    }

    public function show(Contactoextra $contactoextra)
    {
        return response()->json($contactoextra);
    }

    public function update(Request $request, Contactoextra $contactoextra)
    {
        $contactoextra->update($request->all());
        return response()->json($contactoextra);
    }

    public function destroy(Contactoextra $contactoextra)
    {
        $contactoextra->delete();
        return response()->json(null, 204);
    }
}

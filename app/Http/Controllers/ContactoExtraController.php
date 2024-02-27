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
}

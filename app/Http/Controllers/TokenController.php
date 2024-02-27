<?php

namespace App\Http\Controllers;
use App\Models\Token;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function index()
    {
        try {
            $tokens = Token::all();
            return response()->json($tokens);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

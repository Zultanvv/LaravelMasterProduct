<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller; // Perbaikan disini!

class ApiGetTokenController extends Controller
{
    public function getToken(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Cek kredensial
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Ambil user yang berhasil login
        $user = Auth::user();

        // Generate token baru
        $token = $user->createToken('API Token')->plainTextToken;

        // Return response dengan token
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
}

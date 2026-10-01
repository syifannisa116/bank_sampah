<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NasabahController extends Controller
{
    public function me(Request $request)
    {
        $nasabah = $request->user()->nasabah;

        if (! $nasabah) {
            return response()->json([
                'message' => 'Profil nasabah belum terhubung dengan akun ini.',
            ], 404);
        }

        return response()->json([
            'data' => [
                'id' => $nasabah->id,
                'nama' => $nasabah->nama,
                'no_telp' => $nasabah->no_telp,
                'alamat' => $nasabah->alamat,
                'saldo' => $nasabah->saldo,
            ],
        ]);
    }
}
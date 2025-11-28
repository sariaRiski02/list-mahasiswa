<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class mahasiswaController extends Controller
{
    public function allMahasiswa() {
        return response()->json([
            'message' => 'List of all Mahasiswa',
            'data' => Mahasiswa::all()
        ]);
    }

    public function getMahasiswa($id) {
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa found',
                'data' => $mahasiswa
            ]);
        } else {
            return response()->json([
                'message' => 'Mahasiswa not found'
            ], 404);
        }
    }

    public function createMahasiswa(Request $request) {
        

        // validation
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswas,nim',
            'fakultas' => 'required|string|max:255',
        ]);
        

        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json([
            'message' => 'Mahasiswa created successfully',
            'data' => $mahasiswa
        ], 201);
    }

    public function updateMahasiswa(Request $request, $id) {
        $mahasiswa = Mahasiswa::find($id);

        $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'nim' => 'sometimes|required|string|unique:mahasiswas,nim,' . $id,
            'fakultas' => 'sometimes|required|string|max:255',
        ]);

        if ($mahasiswa) {
            $mahasiswa->update($request->all());
            return response()->json([
                'message' => 'Mahasiswa updated successfully',
                'data' => $mahasiswa
            ]);
        } else {
            return response()->json([
                'message' => 'Mahasiswa not found'
            ], 404);
        }
    }

    public function deleteMahasiswa($id) {
        $mahasiswa = Mahasiswa::find($id);
        if ($mahasiswa) {
            $mahasiswa->delete();
            return response()->json([
                'message' => 'Mahasiswa deleted successfully'
            ]);
        } else {
            return response()->json([
                'message' => 'Mahasiswa not found'
            ], 404);
        }
    }

}

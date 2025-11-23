<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan; // Model Anda
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Untuk validasi

class PelangganApiController extends Controller
{
    /**
     * Menampilkan semua data pelanggan. (METHOD: GET)
     */
    public function index()
    {
        $data = Pelanggan::orderBy('nama', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Menyimpan data pelanggan baru. (METHOD: POST)
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ];

        $validator = Validator::make($request->all(), $rules);

        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ], 400); // 400 = Bad Request
        }

        // Jika validasi berhasil
        $pelanggan = Pelanggan::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data pelanggan berhasil ditambahkan',
            'data' => $pelanggan
        ], 201); // 201 = Created
    }

    /**
     * Menampilkan satu data pelanggan. (METHOD: GET by ID)
     */
    public function show(string $id)
    {
        $data = Pelanggan::find($id);

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data ditemukan',
                'data' => $data
            ], 200); // 200 = OK
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404); // 404 = Not Found
        }
    }

    /**
     * Mengupdate data pelanggan. (METHOD: PUT/PATCH)
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::find($id);

        if (empty($pelanggan)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404); // 404 = Not Found
        }

        $rules = [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan update data',
                'data' => $validator->errors()
            ], 400); // 400 = Bad Request
        }

        // Jika validasi berhasil
        $pelanggan->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Data pelanggan berhasil diupdate',
            'data' => $pelanggan
        ], 200); // 200 = OK
    }

    /**
     * Menghapus data pelanggan. (METHOD: DELETE)
     */
    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::find($id);

        if (empty($pelanggan)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404); // 404 = Not Found
        }

        $pelanggan->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data pelanggan berhasil dihapus'
        ], 200); // 200 = OK
        
        // Alternatif: return response()->json(null, 204); // 204 = No Content
    }
}
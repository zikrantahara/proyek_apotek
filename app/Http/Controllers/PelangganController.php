<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PelangganExport;
use App\Imports\PelangganImport;

class PelangganController extends Controller
{
    /**
     * Menampilkan daftar semua pelanggan.
     */
    public function index()
    {
        $pelanggans = Pelanggan::latest()->paginate(10);
        return view('pelanggan.index', compact('pelanggans'));
    }

    /**
     * Menampilkan form untuk membuat pelanggan baru.
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Menyimpan data pelanggan baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        // Buat record baru
        Pelanggan::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Memperbarui data di database.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:15',
        ]);

        // Update record
        $pelanggan->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        // Hapus record
        $pelanggan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus.');
    }

    /**
     * Mengekspor data pelanggan ke file Excel.
     */
    public function exportExcel()
    {
        $namaFile = 'data_pelanggan_' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new PelangganExport, $namaFile);
    }

    /**
     * Menampilkan form untuk import data.
     */
    public function showImportForm()
    {
        return view('pelanggan.import');
    }

    /**
     * Mengimpor data dari file Excel ke database.
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new PelangganImport, $request->file('file'));

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diimpor.');
    }
}

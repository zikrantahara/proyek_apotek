<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ObatExport;
use App\Imports\ObatImport;

class ObatController extends Controller
{
    /**
     * Menampilkan daftar semua obat.
     */
    public function index()
    {
        $obats = Obat::latest()->paginate(10);
        return view('obat.index', compact('obats'));
    }

    /**
     * Menampilkan form untuk membuat obat baru.
     */
    public function create()
    {
        return view('obat.create');
    }

    /**
     * Menyimpan data obat baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_obat' => 'required|string|unique:obats|max:50',
            'nama_obat' => 'required|string|max:255',
            'stock_obat' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);

        // Buat record baru
        Obat::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit(Obat $obat)
    {
        return view('obat.edit', compact('obat'));
    }

    /**
     * Memperbarui data di database.
     */
    public function update(Request $request, Obat $obat)
    {
        // Validasi input
        $request->validate([
            'kode_obat' => 'required|string|max:50|unique:obats,kode_obat,' . $obat->id,
            'nama_obat' => 'required|string|max:255',
            'stock_obat' => 'required|integer|min:0',
            'tanggal_kadaluarsa' => 'required|date',
        ]);
        // Update record
        $obat->update($request->all());
        // Redirect dengan pesan sukses
        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(Obat $obat)
    {
        // Hapus record
        $obat->delete();
        // Redirect dengan pesan sukses
        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil dihapus.');
    }

    /**
     * Mengekspor data obat ke file Excel.
     */
    public function exportExcel()
    {
        $namaFile = 'data_obat_' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new ObatExport, $namaFile);
    }

    /**
     * Menampilkan form untuk import data.
     */
    public function showImportForm()
    {
        return view('obat.import');
    }

    /**
     * Mengimpor data dari file Excel ke database.
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new ObatImport, $request->file('file'));
        return redirect()->route('obat.index')
            ->with('success', 'Data obat berhasil diimpor.');
    }
}

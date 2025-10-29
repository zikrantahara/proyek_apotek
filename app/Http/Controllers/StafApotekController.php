<?php

namespace App\Http\Controllers;

use App\Models\StafApotek;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StafApotekExport;
use App\Imports\StafApotekImport;

class StafApotekController extends Controller
{
    /**
     * Menampilkan daftar semua staf.
     */
    public function index()
    {
        $stafs = StafApotek::latest()->paginate(10);
        return view('staf.index', compact('stafs'));
    }

    /**
     * Menampilkan form untuk membuat staf baru.
     */
    public function create()
    {
        return view('staf.create');
    }

    /**
     * Menyimpan data staf baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:15',
        ]);

        // Buat record baru
        StafApotek::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('staf.index')
            ->with('success', 'Data staf berhasil ditambahkan.');
    }

    /**
     * Menampilkan form untuk mengedit data.
     */
    public function edit(StafApotek $staf)
    {
        return view('staf.edit', compact('staf'));
    }

    /**
     * Memperbarui data di database.
     */
    public function update(Request $request, StafApotek $staf)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string|max:15',
        ]);
        // Update record
        $staf->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('staf.index')
            ->with('success', 'Data staf berhasil diperbarui.');
    }

    /**
     * Menghapus data dari database.
     */
    public function destroy(StafApotek $staf)
    {
        // Hapus record
        $staf->delete();
        // Redirect dengan pesan sukses
        return redirect()->route('staf.index')
            ->with('success', 'Data staf berhasil dihapus.');
    }

    /**
     * Mengekspor data staf ke file Excel.
     */
    public function exportExcel()
    {
        $namaFile = 'data_staf_apotek_' . date('Y-m-d_H-i-s') . '.xlsx';
        return Excel::download(new StafApotekExport, $namaFile);
    }

    /**
     * Menampilkan form untuk import data.
     */
    public function showImportForm()
    {
        return view('staf.import');
    }

    /**
     * Mengimpor data dari file Excel ke database.
     */
    public function importExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new StafApotekImport, $request->file('file'));

        return redirect()->route('staf.index')
            ->with('success', 'Data staf berhasil diimpor.');
    }
}

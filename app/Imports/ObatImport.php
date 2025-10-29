<?php

namespace App\Imports;

use App\Models\Obat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date; // Import class untuk konversi tanggal

class ObatImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Obat([
            'kode_obat'          => $row['kode_obat'],
            'nama_obat'          => $row['nama_obat'],
            'stock_obat'         => $row['stock_obat'],
            // Konversi tanggal dari format angka Excel ke format database
            'tanggal_kadaluarsa' => Date::excelToDateTimeObject($row['tanggal_kadaluarsa']),
        ]);
    }
}
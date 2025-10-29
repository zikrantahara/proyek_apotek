<?php

namespace App\Imports;

use App\Models\StafApotek;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date; // Import class untuk konversi tanggal

class StafApotekImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new StafApotek([
            'nama'           => $row['nama'],
            'alamat'         => $row['alamat'],
            'tempat_lahir'   => $row['tempat_lahir'],
            // Konversi tanggal dari format angka Excel ke format database
            'tanggal_lahir'  => Date::excelToDateTimeObject($row['tanggal_lahir']), 
            'no_hp'          => $row['no_hp'],
        ]);
    }
}
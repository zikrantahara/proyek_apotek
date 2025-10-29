<?php

namespace App\Exports;

use App\Models\Obat;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ObatExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Obat::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'KODE OBAT',
            'NAMA OBAT',
            'STOCK OBAT',
            'TANGGAL KADALUARSA',
        ];
    }

    public function map($obat): array
    {
        return [
            $obat->id,
            $obat->kode_obat,
            $obat->nama_obat,
            $obat->stock_obat,
            $obat->tanggal_kadaluarsa,
        ];
    }
}
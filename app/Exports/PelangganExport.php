<?php

namespace App\Exports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PelangganExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return Pelanggan::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAMA',
            'ALAMAT',
            'NO. HP',
            'TANGGAL INPUT',
        ];
    }

    public function map($pelanggan): array
    {
        return [
            $pelanggan->id,
            $pelanggan->nama,
            $pelanggan->alamat,
            $pelanggan->no_hp,
            $pelanggan->created_at->format('d-m-Y H:i:s'),
        ];
    }
}
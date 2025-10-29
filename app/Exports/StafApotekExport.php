<?php

namespace App\Exports;

use App\Models\StafApotek;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StafApotekExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return StafApotek::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAMA',
            'ALAMAT',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'NO. HP',
        ];
    }

    public function map($staf): array
    {
        return [
            $staf->id,
            $staf->nama,
            $staf->alamat,
            $staf->tempat_lahir,
            $staf->tanggal_lahir,
            $staf->no_hp,
        ];
    }
}
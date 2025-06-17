<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        // Hanya export yang statusnya "santri"
        return Student::where('status', 'santri')
            ->select('name', 'tanggal_lahir', 'alamat', 'kelamin', 'nama_wali')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Tanggal Lahir',
            'Alamat',
            'Jenis Kelamin',
            'Nama Wali',
        ];
    }
}

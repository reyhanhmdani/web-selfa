<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\StudentsExport;

class SantriExportControler extends Controller
{
    public function exportPdf($id)
    {
        $santri = Student::findOrFail($id);
        $pdf = Pdf::loadView('santri.detail', compact('santri'))->setPaper('A4');
        return $pdf->download('DataSantri-' . $santri->name . '.pdf');
    }

    // Export semua ke Excel
    public function exportExcel()
    {
        $data = Student::where('status', 'santri')->get();

        return Excel::download(new StudentsExport($data), 'santri_aktif.xlsx');
    }

    // Export semua ke PDF (versi ringkas)
    public function exportAllPdf()
    {
        $santris = Student::where('status', 'santri')->get();
        $pdf = Pdf::loadView('santri.all', compact('santris'))->setPaper('A4', 'landscape');
        return $pdf->download('santri_aktif.pdf');
    }
}

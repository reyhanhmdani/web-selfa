<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DokumentsasiSantriController extends Controller
{
    public function dokumentId($id)
    {
        $santri = Student::findOrFail($id);
        $files = is_array($santri->images) ? $santri->images : json_decode($santri->images, true);
        return view('pages.dokumentasi', compact('santri', 'files'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Asatid;
use App\Models\Student;
use Illuminate\Http\Request;

class DokumentsasiSantriController extends Controller
{
    public function dokumentId($tipe, $id)
    {
        if ($tipe === 'santri') {
            $person = Student::findOrFail($id);
        } elseif ($tipe === 'asatid') {
            $person = Asatid::findOrFail($id);
        } else {
            abort(404);
        }

        $files = is_array($person->images) ? $person->images : json_decode($person->images, true);

        return view('pages.dokumentasi', [
            'person' => $person,
            'files' => $files,
            'tipe' => $tipe
        ]);
    }
}

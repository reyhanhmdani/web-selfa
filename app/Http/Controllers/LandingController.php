<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Footer;
use App\Models\Team;
use App\Models\About;
use App\Models\Navbar;
use App\Models\Lembaga;
use App\Models\Program;
use App\Models\Student;
use App\Models\Visimisi;
use App\Models\GaleriFoto;
use App\Models\Pendidikan;
use App\Models\ContactInfo;
use Illuminate\Http\Request;
use App\Models\SectionHeader;

class LandingController extends Controller
{
    public function index()
    {
        // Section
        $navbar = Navbar::first();
        $header = SectionHeader::where('section_key', 'program')->first();
        $about = About::first();
        $pendidikans = Pendidikan::take(3)->get();
        $footer = Footer::getSingleton();

        // Content
        $totalSantri = Student::count();
        $programs = Program::orderBy('order')->get();
        $blogs = Blog::latest()->get();
        $lembagas = Lembaga::all();
        $totalLembaga = Lembaga::count();
        $teams = Team::all();
        $galeriFoto = GaleriFoto::all();
        $visiMisi = Visimisi::first();

        // Kontak
        $alamat = ContactInfo::where('key', 'alamat')->first()?->value;
        $telepon = ContactInfo::where('key', 'telepon')->first()?->value;
        $email = ContactInfo::where('key', 'email')->first()?->value;
        $jam = ContactInfo::where('key', 'jam')->first()?->value;

        return view('pages.ponpes', compact('navbar', 'about', 'pendidikans', 'totalSantri', 'programs', 'blogs', 'lembagas', 'totalLembaga', 'teams', 'galeriFoto', 'visiMisi',  'footer', 'alamat', 'telepon', 'email', 'jam'));
    }


    public function ponpes ()
    {
         // Section
        $navbar = Navbar::first();
        $header = SectionHeader::where('section_key', 'program')->first();
        $about = About::first();
        $pendidikans = Pendidikan::take(3)->get();
        $footer = Footer::getSingleton();

        // Content
        $totalSantri = Student::count();
        $programs = Program::orderBy('order')->get();
        $blogs = Blog::latest()->get();
        $lembagas = Lembaga::all();
        $totalLembaga = Lembaga::count();
        $teams = Team::all();
        $galeriFoto = GaleriFoto::all();
        $visiMisi = Visimisi::first();

        // Kontak
        $alamat = ContactInfo::where('key', 'alamat')->first()?->value;
        $telepon = ContactInfo::where('key', 'telepon')->first()?->value;
        $email = ContactInfo::where('key', 'email')->first()?->value;
        $jam = ContactInfo::where('key', 'jam')->first()?->value;

        return view('pages.ponpes', compact('navbar', 'about', 'pendidikans', 'totalSantri', 'programs', 'blogs', 'lembagas', 'totalLembaga', 'teams', 'galeriFoto', 'visiMisi',  'footer', 'alamat', 'telepon', 'email', 'jam'));
    }
}

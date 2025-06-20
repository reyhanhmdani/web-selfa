<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Footer;
use App\Models\HeroSection;
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
        $navbar = Navbar::where('status_page', 'utama')->first();
        $heroSection = HeroSection::where('status_page', 'utama')->first();
        $sections = SectionHeader::get()->keyBy('section_key');
        $about = About::where('status_page', 'utama')->first();
        $pendidikans = Pendidikan::take(3)->get();
        $footer = Footer::getSingleton();

        // Content
        $totalSantri = Student::count();
        $programs = Program::orderBy('order')->where('status_page', 'utama')->get();
        $blogs = Blog::latest()->get();
        $lembagas = Lembaga::all();
        $totalLembaga = $lembagas->count();
        $teams = Team::all();
        $galeriFoto = GaleriFoto::latest()->take(8)->get();
        $visiMisi = Visimisi::first();

        // Kontak
       // MENJADI (1 Query):
        $kontak = ContactInfo::whereIn('key', ['alamat', 'telepon', 'email', 'jam'])
                        ->get()
                        ->keyBy('key');

        return view('pages.home', compact('navbar', 'heroSection', 'sections', 'about', 'pendidikans', 'totalSantri', 'programs', 'blogs', 'lembagas', 'totalLembaga', 'teams', 'galeriFoto', 'visiMisi',  'footer', 'kontak'));
    }


    public function ponpes ()
    {
         // Section
        $navbar = Navbar::where('status_page', 'ponpes')->first();
        $heroSection = HeroSection::where('status_page', 'ponpes')->first();
        $sections = SectionHeader::get()->keyBy('section_key');
        $about = About::where('status_page', 'ponpes')->first();
        $pendidikans = Pendidikan::take(3)->get();
        $footer = Footer::getSingleton();

        // Content
        $totalSantri = Student::count();
        $programs = Program::orderBy('order')->get();
        $blogs = Blog::latest()->get();
        $lembagas = Lembaga::all();
        $totalLembaga = $lembagas->count();
        $teams = Team::all();
        $galeriFoto = GaleriFoto::latest()->take(9)->get();
        $visiMisi = Visimisi::first();

        // Kontak
        $kontak = ContactInfo::whereIn('key', ['alamat', 'telepon', 'email', 'jam'])
                        ->get()
                        ->keyBy('key');

        return view('pages.ponpes', compact('navbar', 'heroSection', 'sections',  'about', 'pendidikans', 'totalSantri', 'programs', 'blogs', 'lembagas', 'totalLembaga', 'teams', 'galeriFoto', 'visiMisi',  'footer', 'kontak'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Team;
use App\Models\About;
use App\Models\Lembaga;
use App\Models\Navbar;
use App\Models\Program;
use App\Models\Student;
use App\Models\Pendidikan;
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

        // Content
        $totalSantri = Student::count();
        $programs = Program::orderBy('order')->get();
        $blogs = Blog::latest()->get();
        $lembagas = Lembaga::all();
        $totalLembaga = Lembaga::count();
        $teams = Team::all();

        return view('pages.home', compact('navbar', 'about', 'pendidikans', 'totalSantri', 'programs', 'blogs', 'lembagas', 'totalLembaga', 'teams'));
    }
}

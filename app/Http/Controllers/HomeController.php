<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;

class HomeController extends Controller
{
    public function index()
    {
        $kabupaten = Kabupaten::with('sekolah')->get();
        $title = 'Dashboard';
        $header = 'Peta Kabupaten Banyumas';

        return view('home.home-index', compact('kabupaten', 'title', 'header'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaAlumniController extends Controller
{
    public function index()
    {
        return view('pengguna_alumni.index');
    }

    public function invitation()
    {
        return view('pengguna_alumni.invitation');
    }
}

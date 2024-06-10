<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = User::with('alumni')->where('role', 'Alumni')->orderBy('id', 'desc')->get();
        }

        return view('alumni.index');
    }
}

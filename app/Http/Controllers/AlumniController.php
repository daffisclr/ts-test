<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {

        $data = User::with('alumni')->where('role', 'Alumni')->orderBy('id', 'desc')->get();

        return view('alumni.index',compact('data'));
    }

    public function show()
    {
        $data = User::with('alumni')->where('role', 'Alumni')->orderBy('id', 'desc')->get();

        return view('alumni.includes.show', compact('data'));
    }

    public function export_excel()
    {

    }
}

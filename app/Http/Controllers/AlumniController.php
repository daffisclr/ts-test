<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AlumniController extends Controller
{
    public function index()
    {

        $data = User::with('alumni')->where('role', 'Alumni')->orderBy('id', 'desc')->get();

        return view('alumni.index',compact('data'));
    }
}

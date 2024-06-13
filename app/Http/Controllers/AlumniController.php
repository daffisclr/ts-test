<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function export_pdf(Request $request)
    {
        $users = User::with('alumni')->where('role', 'Alumni')->orderBy('id', 'desc')->get();

        $data =
        [
            'title' => 'List Alumni Jurusan Teknik Informatika PNJ',
            'date' => date('d/m/Y'),
            'users' => $users
        ];

        $pdf = PDF::loadView('pdf.AlumniPDF', $data);
        return $pdf->download('listalumnijtik.pdf');

        return redirect()->route('alumni.index')->withSuccess('PDF downloaded successfully.');
    }
}

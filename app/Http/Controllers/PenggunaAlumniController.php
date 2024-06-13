<?php

namespace App\Http\Controllers;

use App\Mail\PostMail;
use App\Models\PenggunaAlumni;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class PenggunaAlumniController extends Controller
{
    public function index() : View
    {
        //get all Pengguna Alumni
        $alumniusers = PenggunaAlumni::latest()->paginate(10);

        return view('pengguna_alumni.index', compact('alumniusers'));
    }

    public function invitation()
    {
        return view('pengguna_alumni.invitation');
    }

    public function store(Request $request): RedirectResponse
    {
        // validate
        $request->validate([
            'name'            => 'required|string|max:255',
            'email'           => 'required|string|email|max:255',
            'phone'           => 'required|string|max:255',
            'company'         => 'required|string|max:255',
            'position'        => 'required|string|max:255',
            'company_contact' => 'required|string|max:255',
        ]);

        // PenggunaAlumni::create([
        //     'name'            => $request->name,
        //     'email'           => $request->email,
        //     'phone'           => $request->phone,
        //     'company'         => $request->company,
        //     'position'        => $request->position,
        //     'company_contact' => $request->company_contact,
        // ]);

        Mail::to($request->email)->send(new PostMail($request));

        //redirect to index
        return redirect()->route('pengguna-alumni.invitation')->with(['success' => 'Email Telah Terkirim!']);
    }

    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $alumniusers = PenggunaAlumni::findOrFail($id);

        //delete product
        $alumniusers->delete();

        //redirect to index
        return redirect()->route('pengguna-alumni.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

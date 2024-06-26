<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::user()->id,
            'username' => 'required|string|max:255|unique:users,username,' . Auth::user()->id,
            'phone_number' => 'required|string|max:255',
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:current_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password'
        ]);


        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->phone_number = $request->input('phone_number');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = $request->input('new_password');
            } else {
                return redirect()->back()->withInput();
            }
        }

        $user->save();

        if (
            $request->has('prodi') &&
            $request->has('jenjang') &&
            $request->has('jenis_kelamin') &&
            $request->has('agama') &&
            $request->has('tahun_masuk') &&
            $request->has('tahun_lulus')
        ) {
            Alumni::updateOrCreate(
                [
                    'user_id' => $user->id
                ],
                [
                    'user_id' => $user->id,
                    'prodi' => $request->prodi,
                    'jenjang' => $request->jenjang,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'agama' => $request->agama,
                    'tahun_masuk' => $request->tahun_masuk,
                    'tahun_lulus' => $request->tahun_lulus,
                ]
            );
        }

        return redirect()->route('profile')->withSuccess('Profile updated successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Livewire\Kuesioner;
use App\Models\Alumni;
use App\Models\kuesioner\Kuesioner_Tracer_Study;
use App\Models\kuesioner\Work;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Number;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::where('role','Alumni')->count();

        $alumni_ti = Alumni::where('prodi','Teknik Informatika')->count();

        $alumni_tmj = Alumni::where('prodi', 'Teknik Multimedia dan Jaringan')->count();

        $alumni_tmd = Alumni::where('prodi', 'Teknik Multimedia Digital')->count();

        $alumni_tkj = Alumni::where('prodi', 'Teknik Komputer dan Jaringan')->count();

        $count_ts = DB::table('kuesioner')->count();

        $pendapatan = Number::currency(DB::table('kuesioner_work')->avg('salary'), 'IDR');

        $masa_tunggu = round(DB::table('kuesioner_work')->avg('job_acquired_time'));

        $widget = [
            'users' => $users,
            'alumni_ti' => $alumni_ti,
            'alumni_tmj' => $alumni_tmj,
            'alumni_tmd' => $alumni_tmd,
            'alumni_tkj' => $alumni_tkj,
            'count_ts' => $count_ts,
            'masa_tunggu' => $masa_tunggu,
            'pendapatan' => $pendapatan
            //...
        ];
        $count_answer = 0;
        if (auth()->user()->role == 'Alumni') {
            $count_answer  = DB::table('kuesioner')->where('alumni_id', auth()->id())->count();
        }

        return view('home', [
            'widget' => $widget,
            'count_answer' => $count_answer
        ]);
    }
}

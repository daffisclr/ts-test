<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    public function ShowKuesioner ()
    {
        return view('tracer_study.kuesioner');
    }
}

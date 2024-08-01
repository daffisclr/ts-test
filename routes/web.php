<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\PenggunaAlumniController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/validasi_pengguna_alumni', function (){
    return view('pengguna_alumni.validate');
});

Route::get('/survey_pengguna', function(){
    return view('pengguna_alumni.kuesioner_penilaian_alumni');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

    // Middleware Alumni
    Route::controller(AlumniController::class)->as('alumni.')->group(function () {
        Route::get('list_alumni', 'index')->name('index');
        Route::get('chart_alumni', 'chart')->name('chart');
        Route::get('pdf_generator', 'export_pdf')->name('pdf');
        Route::get('view_kuesioner/{user_id}', 'view_kuesioner')->name('view_kuesioner');
    });

    // Middleware Pengguna Alumni
    Route::controller(PenggunaAlumniController::class)->as('pengguna-alumni.')->group(function () {
        Route::get('invite_pengguna_alumni', 'invitation')->name('invitation');
        Route::post('send_pengguna_alumni', 'store')->name('send');
        Route::post('delete_pengguna_alumni/{id}', 'destroy')->name('destroy');
        Route::get('list_pengguna_alumni', 'index')->name('index');
    });


    // Middleware Tracer Study
    Route::controller(KuesionerController::class)->as('tracer-study.')->group(function () {
        Route::get('kuesioner_tracer_study', 'ShowKuesioner')->name('kuesioner');
        Route::post('kuesioner-form',  'kuesioner_form')->name("kuesioner-form");

    });

    // Middleware Chart Tracer Study
    Route::controller(KuesionerController::class)->as('tracer-study.')->group(function () {
        Route::get('charts_ti', 'charts_ti')->name('charts_ti');
        Route::get('charts_tmj', 'charts_tmj')->name('charts_tmj');
        Route::get('charts_tmd', 'charts_tmd')->name('charts_tmd');
        Route::get('charts_tkj', 'charts_tkj')->name('charts_tkj');
    });

    // Middleware Chart Alumni
    Route::controller(ChartController::class)->as('chart.')->group(function () {
        Route::get('alumni-chart', 'get_alumni_info')->name('alumni-chart');

    });
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/tracer_study', function() {
    return view('tracer_study.index');
});

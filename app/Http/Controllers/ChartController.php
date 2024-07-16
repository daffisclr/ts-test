<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function get_alumni_info()
    {
        // $data = DB::table("alumnis")->select(['id','prodi','jenjang','agama', 'tahun_masuk','tahun_lulus'])->get();

        $prodi = DB::select("
                select
                	a.prodi,
                	count(a.prodi) as jml_prodi
                from
                	alumnis a
                group by
                	a.prodi
    ");

        $jenjang = DB::select("
    select
        a.jenjang,
        count(a.jenjang) as jml_jenjang
    from
        alumnis a
    group by
        a.jenjang
");

        $jenis_kelamin = DB::select("
select
    a.jenis_kelamin,
    count(a.jenis_kelamin) as jml_jenis_kelamin
from
    alumnis a
group by
    a.jenis_kelamin
");

        $agama = DB::select("
select
    a.agama,
    count(a.agama) as jml_agama
from
    alumnis a
group by
    a.agama
");

        $tahun_masuk = DB::select("
select
    a.tahun_masuk,
    count(a.tahun_masuk) as jml_tahun_masuk
from
    alumnis a
group by
    a.tahun_masuk
");

        $tahun_lulus = DB::select("
select
    a.tahun_lulus,
    count(a.tahun_lulus) as jml_tahun_lulus
from
    alumnis a
group by
    a.tahun_lulus
");

        return [
            'prodi' => $prodi,
            'jenjang' => $jenjang,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
            'tahun_masuk' => $tahun_masuk,
            'tahun_lulus' => $tahun_lulus,
        ];
    }
}

<?php

namespace App\Models\kuesioner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Competency extends Model
{
    use  HasFactory, Notifiable;

    protected $guard = "user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'kuesioner_work_id',
        'type',
        'ethics',
        'expertise',
        'english',
        'tech',
        'communication',
        'teamwork',
        'development',
    ];


    public function tracer_study()
    {
        return $this->belongsTo(Work::class);
    }

    public static function countCompetency(?string $prodi, string $type)
    {
        $categories = [
            (object) ["name" =>"ETHICS", "alias" => "Etika"],
            (object) ["name" =>"EXPERTISE", "alias" => "Pengetahuan"],
            (object) ["name" =>"ENGLISH", "alias" => "Bahasa Inggris"],
            (object) ["name" =>"TECH", "alias" => "Teknologi"],
            (object) ["name" =>"COMMUNICATION", "alias" => "Komunikasi"],
            (object) ["name" =>"TEAMWORK", "alias" => "Kerjasama"],
            (object) ["name" =>"DEVELOPMENT", "alias" => "Perkembangan"],
        ];

        $totalRows = DB::table('KUESIONER_COMPETENCY AS KC')
        ->leftJoin('KUESIONER_WORK AS KW', 'KW.ID', '=', 'KC.KUESIONER_WORK_ID')
        ->leftJoin('KUESIONER AS K', 'K.ID', '=', 'KW.TRACER_STUDY_ID')
        ->leftJoin('ALUMNIS AS A', 'A.ID', '=', 'K.ALUMNI_ID')
        ->select([
            DB::raw("SUM(CASE WHEN KC.TYPE = 'work' THEN 1 ELSE 0 END) AS work_count"),
            DB::raw("SUM(CASE WHEN KC.TYPE = 'graduation' THEN 1 ELSE 0 END) AS graduation_count")
        ])
        ->when($prodi, function ($query, $prodi) {
            return $query->where('A.prodi', $prodi);
        })
        ->first();
        $work_count = $totalRows->work_count;
        $graduation_count = $totalRows->graduation_count;

        foreach ($categories as $key => $value) {
            $row = DB::select("SELECT
                ROUND(COUNT(CASE WHEN KC.$value->name = 1 THEN 1 END)) AS SCORE_1,
                ROUND(COUNT(CASE WHEN KC.$value->name = 2 THEN 1 END)) AS SCORE_2,
                ROUND(COUNT(CASE WHEN KC.$value->name = 3 THEN 1 END)) AS SCORE_3,
                ROUND(COUNT(CASE WHEN KC.$value->name = 4 THEN 1 END)) AS SCORE_4,
                ROUND(COUNT(CASE WHEN KC.$value->name = 5 THEN 1 END)) AS SCORE_5
                FROM
                	KUESIONER_COMPETENCY KC
                LEFT JOIN KUESIONER_WORK KW ON
                	KW.ID = KC.KUESIONER_WORK_ID
                LEFT JOIN KUESIONER K ON
                	K.ID = KW.TRACER_STUDY_ID
                LEFT JOIN ALUMNIS A ON
                	A.ID = K.ALUMNI_ID
                    WHERE KC.TYPE = '$type' "
                . ($prodi ? "AND A.PRODI = '$prodi'" : ""))[0];

            $result[] = (object) [
                'Category' => $value->alias,
                'Sangat Rendah' => (int) $row->SCORE_1,
                'Rendah' => (int) $row->SCORE_2,
                'Cukup' => (int) $row->SCORE_3,
                'Tinggi' => (int) $row->SCORE_4,
                'Sangat Tinggi' => (int) $row->SCORE_5,
            ];
        }

        return $result;
    }
}

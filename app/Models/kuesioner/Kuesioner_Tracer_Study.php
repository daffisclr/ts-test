<?php

namespace App\Models\kuesioner;

use App\Models\Alumni;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Kuesioner_Tracer_Study extends Model
{
    use  HasFactory, Notifiable;

    protected $guard = "user";
    protected $table = 'kuesioner'; // Specify the table name

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'alumni_id',
        'alumni_status',
        'university_payment_source',
        'lecture_method',
        'demo_method',
        'project_method',
        'internship_method',
        'practical_method',
        'field_method',
        'discussion_method',
    ];


    public function identity(): BelongsTo
    {
        return $this->belongsTo(Alumni::class);
    }

    public static function countAverageMethod(?string $prodi)
    {

        $result = DB::select("SELECT
	ROUND(AVG(K.LECTURE_METHOD)) AS LECTURE,
	ROUND(AVG(K.DEMO_METHOD)) AS DEMO,
	ROUND(AVG(K.PROJECT_METHOD)) AS PROJECT,
	ROUND(AVG(K.INTERNSHIP_METHOD)) AS INTERNSHIP,
	ROUND(AVG(K.PRACTICAL_METHOD)) AS PRACTICAL,
	ROUND(AVG(K.FIELD_METHOD)) AS FIELD,
	ROUND(AVG(K.DISCUSSION_METHOD)) AS DISCUSSION,
	COUNT(K.ALUMNI_ID) AS ALUMNI
FROM
	KUESIONER K
LEFT JOIN ALUMNIS A ON
	A.ID = K.ALUMNI_ID "
            . ($prodi == null ? "" : "WHERE A.PRODI = '$prodi'"));

        if (!empty($result)) {
            $result = $result[0];

            // Cast the fields to integers or floats as needed
            $result->LECTURE = (int) $result->LECTURE;
            $result->DEMO = (int) $result->DEMO;
            $result->PROJECT = (int) $result->PROJECT;
            $result->INTERNSHIP = (int) $result->INTERNSHIP;
            $result->PRACTICAL = (int) $result->PRACTICAL;
            $result->FIELD = (int) $result->FIELD;
            $result->DISCUSSION = (int) $result->DISCUSSION;
            $result->ALUMNI = (int) $result->ALUMNI;

            return $result;
        }

        return null;
    }

    public static function countPercentMethod(?string $prodi)
    {
        $result =  [];

        $totalRows = DB::table('kuesioner as k')
            ->leftJoin('alumnis as a', 'a.id', '=', 'k.alumni_id')
            ->where('a.prodi', 'Teknik Informatika')
            ->count();

        $methods   = [
            (object) ["name" => "LECTURE_METHOD", "alias" => 'Perkuliahan'],
            (object) ["name" => "DEMO_METHOD", "alias" => 'Demonstrasi'],
            (object) ["name" => "PROJECT_METHOD", "alias" => 'Proyek Riset'],
            (object) ["name" => "INTERNSHIP_METHOD", "alias" => 'Magang'],
            (object) ["name" => "PRACTICAL_METHOD", "alias" => 'Praktikum'],
            (object) ["name" => "FIELD_METHOD", "alias" => 'Kerja lapangan'],
            (object) ["name" => "DISCUSSION_METHOD", "alias" => 'Diskusi'],
        ];

        foreach ($methods as $key => $value) {
            $row = DB::select("SELECT
                ROUND(COUNT(CASE WHEN K.$value->name = 1 THEN 1 END)) AS SCORE_1,
                ROUND(COUNT(CASE WHEN K.$value->name = 2 THEN 1 END)) AS SCORE_2,
                ROUND(COUNT(CASE WHEN K.$value->name = 3 THEN 1 END)) AS SCORE_3,
                ROUND(COUNT(CASE WHEN K.$value->name = 4 THEN 1 END)) AS SCORE_4,
                ROUND(COUNT(CASE WHEN K.$value->name = 5 THEN 1 END)) AS SCORE_5
            FROM
                KUESIONER K
            LEFT JOIN ALUMNIS A ON
                A.ID = K.ALUMNI_ID "
                . ($prodi ? "WHERE A.PRODI = '$prodi'" : ""))[0];

            $result[] = (object) [
                'Category' => $value->alias,
                'Sangat Besar' => (int) $row->SCORE_1,
                'Besar' => (int) $row->SCORE_2,
                'Cukup Besar' => (int) $row->SCORE_3,
                'Kurang' => (int) $row->SCORE_4,
                'Tidak Sama Sekali' => (int) $row->SCORE_5,
            ];
        }

        // dd($result);
        return $result;
    }
    public static function countEveryMethod(?string $prodi, string $method)
    {

        $result = DB::select("SELECT
    K.$method AS SCORE,
	IFNULL(COUNT(K.$method), 0) AS JUMLAH
FROM
	KUESIONER K
LEFT JOIN ALUMNIS A ON
	A.ID = K.ALUMNI_ID " . ($prodi == null ? "" : " WHERE A.PRODI = '$prodi' ") .
            " GROUP BY K.$method;");

        $status = [
            1,
            2,
            3,
            4,
            5
        ];

        $statusMap = [];
        foreach ($result as $row) {
            $statusMap[$row->SCORE] = $row->JUMLAH;
        }

        // Iterate over $status array to add missing statuses with jumlah 0
        foreach ($status as $key) {
            if (!isset($statusMap[$key])) {
                $result[] = (object) ['SCORE' => $key, 'JUMLAH' => 0];
            }
        }

        usort($result, function ($a, $b) {
            return strcmp($a->SCORE, $b->SCORE);
        });
        return $result;
    }
}

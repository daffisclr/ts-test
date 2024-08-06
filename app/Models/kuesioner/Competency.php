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

    public static function countCompetency(?string $prodi, string $type, string $category)
    {
        $result = DB::select("SELECT
                            	KC.$category AS SCORE,
                            	COUNT(KC.$category) AS JUMLAH
                            FROM
                            	KUESIONER_COMPETENCY KC
                            LEFT JOIN KUESIONER_WORK KW ON
                            	KW.ID = KC.KUESIONER_WORK_ID
                            LEFT JOIN KUESIONER K ON
                            	K.ID = KW.TRACER_STUDY_ID
                            LEFT JOIN ALUMNIS A ON
                            	A.ID = K.ALUMNI_ID
                            WHERE
                                KC.`type` = '$type' " .
            ($prodi == null ? "" : " AND A.PRODI = '$prodi' ")
            . " GROUP BY
                            	 KC.$category;");

        $status = [
            1, 2, 3, 4, 5
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

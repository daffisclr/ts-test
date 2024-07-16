<?php

namespace App\Models\kuesioner;

use App\Models\Kuesioner_Tracer_Study;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class Work extends Model
{
    use  HasFactory, Notifiable;

    protected $guard = "user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'tracer_study_id',
        'job_position',
        'job_acquired_time',
        'company',
        'salary',
        'company_province',
        'company_regency',
        'company_type',
        'company_level',
        'university_company_relation',
        'university_company_level',
        'applied_company',
        'applied_company_responded',
        'applied_company_interviewed',
        'job_hunting_status',
        'job_hunt_type',
        'job_hunt_month',
    ];


    public function tracer_study()
    {
        return $this->belongsTo(Kuesioner_Tracer_Study::class);
    }

    public static function countWorkStatus(string $prodi)
    {

        $result = DB::select("SELECT
    CASE 
        WHEN K.ALUMNI_STATUS = 1 THEN 'Bekerja'
        WHEN K.ALUMNI_STATUS = 2 THEN 'Wiraswasta'
        WHEN K.ALUMNI_STATUS = 3 THEN 'Melanjutkan Pendidikan'
        WHEN K.ALUMNI_STATUS = 4 THEN 'Tidak Bekerja, Namun Sedang Mencari'
        ELSE 'Belum Memungkinkan Bekerja'
    END AS STATUS,
    COALESCE(COUNT(K.ALUMNI_STATUS), 0) AS JUMLAH
FROM KUESIONER K 
LEFT JOIN ALUMNIS A ON
    A.ID = K.ALUMNI_ID
    WHERE A.PRODI = '$prodi'
GROUP BY
    K.ALUMNI_STATUS;");

        $status = [
            'Bekerja',
            'Wiraswasta',
            'Melanjutkan Pendidikan',
            'Tidak Bekerja, Namun Sedang Mencari',
            'Belum Memungkinkan Bekerja'
        ];

        $statusMap = [];
        foreach ($result as $row) {
            $statusMap[$row->STATUS] = $row->JUMLAH;
        }

        // Iterate over $status array to add missing statuses with jumlah 0
        foreach ($status as $key) {
            if (!isset($statusMap[$key])) {
                $result[] = (object) ['STATUS' => $key, 'JUMLAH' => 0];
            }
        }

        return $result;
    }

    public static function countAverageMethod(string $prodi)
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
	A.ID = K.ALUMNI_ID
WHERE
	A.PRODI = '$prodi'");

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

    public static function countEveryMethod(string $prodi, string $method)
    {

        $result = DB::select("SELECT
	CASE
		WHEN K.$method = 1 THEN 1
		WHEN K.$method = 2 THEN 2
		WHEN K.$method = 3 THEN 3
		WHEN K.$method = 4 THEN 4
		ELSE 5
	END AS SCORE,
	IFNULL(COUNT(K.$method), 0) AS JUMLAH
FROM
	KUESIONER K
LEFT JOIN ALUMNIS A ON
	A.ID = K.ALUMNI_ID
WHERE
	A.PRODI = '$prodi'
GROUP BY
	K.$method;");

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

        return $result;
    }

    public static function countEveryCompetency(string $prodi, string $method)
    {

        $result = DB::select("SELECT
	CASE
		WHEN K.$method = 1 THEN 1
		WHEN K.$method = 2 THEN 2
		WHEN K.$method = 3 THEN 3
		WHEN K.$method = 4 THEN 4
		ELSE 5
	END AS SCORE,
	IFNULL(COUNT(K.$method), 0) AS JUMLAH
FROM
	KUESIONER K
LEFT JOIN ALUMNIS A ON
	A.ID = K.ALUMNI_ID
WHERE
	A.PRODI = '$prodi'
GROUP BY
	K.$method;");

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

        return $result;
    }
}

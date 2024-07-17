<?php

namespace App\Models\kuesioner;

use App\Models\kuesioner\Kuesioner_Tracer_Study;
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

    public static function countJobPosition(string $prodi)
    {

        $result = DB::select("SELECT
	CASE
		WHEN KW.JOB_POSITION = 1 THEN 'Founder'
		WHEN KW.JOB_POSITION = 2 THEN 'Co-Founder'
		WHEN KW.JOB_POSITION = 3 THEN 'Staff'
		WHEN KW.JOB_POSITION = 4 THEN 'Freelance/Kerja Lepas'
		ELSE 'Belum Bekerja'
	END AS POSITION,
	COUNT(KW.JOB_POSITION) AS JUMLAH,
	AVG(KW.SALARY) AS AVG_SALARY,
	AVG(KW.JOB_ACQUIRED_TIME) AS AVG_JOB_ACQUIRED,
	AVG(KW.APPLIED_COMPANY) AS AVG_APPLICATION,
	AVG(KW.APPLIED_COMPANY_INTERVIEWED) AS AVG_COMPANY_INTERVIEWED,
	AVG(KW.APPLIED_COMPANY_RESPONDED) AS AVG_COMPANY_RESPONDED
FROM
	KUESIONER_WORK KW
LEFT JOIN KUESIONER K ON
	K.ID = KW.TRACER_STUDY_ID
LEFT JOIN ALUMNIS A ON
	A.ID = K.ALUMNI_ID
WHERE
	A.PRODI = '$prodi'
	GROUP BY KW.JOB_POSITION;");

        $status = [
            'Founder',
            'Co-Founder',
            'Staff',
            'Freelance/Kerja Lepas',
            'Belum Bekerja',
        ];

        $statusMap = [];
        foreach ($result as $row) {
            $statusMap[$row->POSITION] = [
                'JUMLAH' => $row->JUMLAH,
                "AVG_SALARY" => $row->AVG_SALARY,
                "AVG_JOB_ACQUIRED" => $row->AVG_JOB_ACQUIRED,
                "AVG_APPLICATION" => $row->AVG_APPLICATION,
                "AVG_COMPANY_INTERVIEWED" => $row->AVG_COMPANY_INTERVIEWED,
                "AVG_COMPANY_RESPONDED" => $row->AVG_COMPANY_RESPONDED,
            ];
        }

        // Iterate over $status array to add missing statuses with jumlah 0
        foreach ($status as $key) {
            if (!isset($statusMap[$key])) {
                $result[] = (object) [
                    'POSITION' => $key,
                    'JUMLAH' => 0,
                    "AVG_SALARY" => 0,
                    "AVG_JOB_ACQUIRED" => 0,
                    "AVG_APPLICATION" => 0,
                    "AVG_COMPANY_INTERVIEWED" => 0,
                    "AVG_COMPANY_RESPONDED" => 0,
                ];
            }
        }

        return $result;
    }

    public static function countCompany(string $prodi, string $column, array $type, string $additional_condition = '')
    {
        $result = DB::select("SELECT 
KW.$column,
COUNT(KW.$column) AS JUMLAH
FROM
	KUESIONER_WORK KW
LEFT JOIN KUESIONER K ON
	K.ID = KW.TRACER_STUDY_ID
LEFT JOIN ALUMNIS A ON
	A.ID = K.ALUMNI_ID
WHERE
	A.PRODI = '$prodi'
    $additional_condition
	GROUP BY KW.$column ;");

        $statusMap = [];
        foreach ($result as $row) {
            $statusMap[$row->$column] = $row->JUMLAH;
        }

        // Iterate over $type array to add missing statuses with jumlah 0
        foreach ($type as $key) {
            if (!isset($statusMap[$key])) {
                $result[] = (object) [$column => $key, 'JUMLAH' => 0];
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

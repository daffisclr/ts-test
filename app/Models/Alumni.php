<?php

namespace App\Models;

use App\Models\kuesioner\Kuesioner_Tracer_Study;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;

class Alumni extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'prodi',
        'jenjang',
        'jenis_kelamin',
        'agama',
        'tahun_masuk',
        'tahun_lulus',
        'created_at',
        'updated_at',
    ];

    public function tracer_study(): HasOne
    {
        return $this->hasOne(Kuesioner_Tracer_Study::class);
    }

    public static function get_alumni_kuesioner(int $user_id)
    {
        $kuesioner = DB::select("SELECT
	K.*,
    A.prodi,
    A.jenjang,
    A.jenis_kelamin,
    A.agama,
    A.tahun_masuk,
    A.tahun_lulus,
    U.name,
    U.email,
    U.username,
    U.phone_number,
    U.name
FROM
	KUESIONER K
INNER JOIN (
	SELECT
		KUESIONER.ALUMNI_ID,
		max(KUESIONER.UPDATED_AT) AS MaxDate
	FROM
		KUESIONER
	GROUP BY
		KUESIONER.ALUMNI_ID 
) tm ON
	K.ALUMNI_ID = tm.ALUMNI_ID
	AND K.UPDATED_AT = tm.MaxDate
LEFT JOIN ALUMNIS A ON
	K.ALUMNI_ID = A.ID
LEFT JOIN USERS U ON
	U.ID = A.USER_ID
WHERE
	U.ID = $user_id;");

        return $kuesioner[0];
    }

    public static function get_alumni_work(int $kuesioner_id)
    {
        $kuesioner_work = DB::table("kuesioner_work")->where('TRACER_STUDY_ID', $kuesioner_id)->get()->first();

        $kuesioner_competency = DB::table("KUESIONER_COMPETENCY")->where('KUESIONER_WORK_ID', $kuesioner_work->id)->get();

        $kuesioner_job_hunt_query = DB::table("KUESIONER_WORK_HUNT")->where('KUESIONER_WORK_ID', $kuesioner_work->id)->get();

        $kuesioner_job_hunt = (object)[];

        foreach ($kuesioner_job_hunt_query as $key => $value) {
            $kuesioner_job_hunt->{$value->job_hunt_method} = $value->remarks ?? '';
        }

        $kuesioner_compatibility_query = DB::table("kuesioner_work_compatibility")->where('KUESIONER_WORK_ID', $kuesioner_work->id)->get();

        $kuesioner_compatibility = (object)[];

        foreach ($kuesioner_compatibility_query as $key => $value) {
            $kuesioner_compatibility->{$value->compatibility_type} = $value->compatibility ?? '';
        }
        return (object)compact(
            "kuesioner_work",
            "kuesioner_competency",
            "kuesioner_job_hunt",
            "kuesioner_compatibility"
        );
    }

    public static function get_alumni_education(int $kuesioner_id)
    {
        $kuesioner_education = DB::table("kuesioner_education")->where('tracer_study_id', $kuesioner_id)->get()->first();

        return $kuesioner_education;
    }
}

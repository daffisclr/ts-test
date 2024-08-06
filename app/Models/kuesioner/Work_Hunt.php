<?php

namespace App\Models\kuesioner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Work_Hunt extends Model
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
        'job_hunt_method',
        'remarks',
    ];


    public function tracer_study()
    {
        return $this->belongsTo(Work::class);
    }

    public static function countWorkHunt(?string $prodi)
    {
        $result = DB::select("SELECT
                            	KWH.JOB_HUNT_METHOD,
                            	COUNT(KWH.JOB_HUNT_METHOD) AS JUMLAH
                            FROM
                            	KUESIONER_WORK_HUNT KWH 
                            LEFT JOIN KUESIONER_WORK KW ON
                            	KW.ID = KWH.KUESIONER_WORK_ID
                            LEFT JOIN KUESIONER K ON
                            	K.ID = KW.TRACER_STUDY_ID
                            LEFT JOIN ALUMNIS A ON
                            	A.ID = K.ALUMNI_ID " .
            ($prodi == null ? "" : " WHERE
	A.PRODI = '$prodi' ") .
            " GROUP BY KWH.JOB_HUNT_METHOD;");

        $status = [
            "Melalui iklan di koran/majalah, brosur",
            "Melamar ke perusahaan tanpa mengatuhi lowongan yang ada",
            "Pergi ke bursa/pameran kerja",
            "Mencari lewat internet/iklan online/milis",
            "Dihubungi oleh perusahaan",
            "Menghubungi Kemenakertrans",
            "Menghubungi agen tenaga kerja komersial/swasta",
            "Memperoleh informasi dari pusat pengembangan karir fakultas/universitas",
            "Menghubungi kantor kemahasiswaan/hubungan alumni",
            "Membangun jejaring (network) sejak masih kuliah",
            "Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll)",
            "Membangun bisnis sendiri",
            "Melalui penempatan kerja atau magang",
            "Bekerja di tempat yang sama dengan tempat kerja semasa kuliah",
            "Lainnya",
        ];

        $statusMap = [];
        foreach ($result as $row) {
            $statusMap[$row->JOB_HUNT_METHOD] = $row->JUMLAH;
        }

        // Iterate over $status array to add missing statuses with jumlah 0
        foreach ($status as $key) {
            if (!isset($statusMap[$key])) {
                $result[] = (object) ['JOB_HUNT_METHOD' => $key, 'JUMLAH' => 0];
            }
        }

        return $result;
    }
}

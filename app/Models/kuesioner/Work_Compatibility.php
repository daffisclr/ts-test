<?php

namespace App\Models\kuesioner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Work_Compatibility extends Model
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
        'compatibility_type',
        'compatibility',
    ];


    public function work()
    {
        return $this->belongsTo(Work::class);
    }

    public static function countCompatibility(string $prodi)
    {
        $result = DB::select("SELECT
                            	KWC.COMPATIBILITY_TYPE,
                            	COUNT(KWC.COMPATIBILITY_TYPE) AS JUMLAH
                            FROM
                            	KUESIONER_WORK_COMPATIBILITY KWC
                            LEFT JOIN KUESIONER_WORK KW ON
                            	KW.ID = KWC.KUESIONER_WORK_ID
                            LEFT JOIN KUESIONER K ON
                            	K.ID = KW.TRACER_STUDY_ID
                            LEFT JOIN ALUMNIS A ON
                            	A.ID = K.ALUMNI_ID
                            WHERE
                            	A.PRODI = '$prodi'
                            GROUP BY
                            	KWC.COMPATIBILITY_TYPE;");

        $status = [
            'Pertanyaan tidak sesuai, pekerjaan saya saat ini sudah sesuai dengan pendidikan saya',
            'Saya belum mendapatkan pekerjaan yang lebih sesuai dengan pendidikan saya',
            'Di pekerjaan ini saya memperoleh prospek karir yang baik',
            'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya',
            'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya',
            'Saya dapat memperoleh pendapatan yang lebih tinggi di pekerjaan ini',
            'Pekerjaan saya saat ini lebih aman/terjamin/secure',
            'Pekerjaan saya saat ini lebih menarik',
            'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll',
            'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya',
            'Pekerjaan saya saat ini dpt lebih menjamin kebutuhan keluarga',
            'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya',
            'Lainnya',
        ];

        $statusMap = [];
        foreach ($result as $row) {
            $statusMap[$row->COMPATIBILITY_TYPE] = $row->JUMLAH;
        }

        // Iterate over $status array to add missing statuses with jumlah 0
        foreach ($status as $key) {
            if (!isset($statusMap[$key])) {
                $result[] = (object) ['COMPATIBILITY_TYPE' => $key, 'JUMLAH' => 0];
            }
        }

        return $result;
    }
}

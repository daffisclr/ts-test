<?php

namespace App\Models\kuesioner;

use App\Models\kuesioner\Kuesioner_Tracer_Study;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Study extends Model
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
        'location',
        'payment_type',
        'start_date',
        'university_name',
        'major',
        'reasons',
    ];


    public function tracer_study()
    {
        return $this->belongsTo(Kuesioner_Tracer_Study::class);
    }

    public static function countFurtherEducation(string $prodi, string $column, array $type) {
        $result = DB::select("SELECT 
                            KE.$column,
                            COUNT(KE.$column) AS JUMLAH
                            FROM
                            	KUESIONER_EDUCATION KE
                            LEFT JOIN KUESIONER K ON
                            	K.ID = KE.TRACER_STUDY_ID
                            LEFT JOIN ALUMNIS A ON
                            	A.ID = K.ALUMNI_ID
                            WHERE
                            	A.PRODI = '$prodi'
                            	GROUP BY KE.$column ;");

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
}

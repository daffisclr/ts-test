<?php

namespace App\Models\kuesioner;

use App\Models\Kuesioner_Tracer_Study;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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
}

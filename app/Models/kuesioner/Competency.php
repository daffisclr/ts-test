<?php

namespace App\Models\kuesioner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

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
}

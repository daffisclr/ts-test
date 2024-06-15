<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kuesioner_Tracer_Study extends Model
{
    use  HasFactory;

    protected $guard = "alumni";

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
}

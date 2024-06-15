<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Kuesioner_Identitas extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = "user";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'user_id',
        'name',
        'nim',
        'email',
        'phone',
        'gender',
        'religion',
        'enterace_year',
        'graduation_year',
        'major',
        'degree',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

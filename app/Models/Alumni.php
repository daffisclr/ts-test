<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
}

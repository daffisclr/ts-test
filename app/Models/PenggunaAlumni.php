<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenggunaAlumni extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'name',
        'email',
        'phone',
        'company',
        'position',
        'company_contact',
        'invite_code'
    ];
}

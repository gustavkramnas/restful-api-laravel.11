<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenceModel extends Model
{
    use HasFactory;

    protected $table = 'absence_reports'; //tabell namn i DB

    protected $fillable = [
        'employee_id',
        'date',
        'reason',
        'absence_type',
        'medical_certificate',
        'medical_certificate_photos',
        'approval_by',
        'approval_date',
        'comments',
    ];

    protected $casts = [
        'medical_certificate_photos' => 'array',
    ];

}

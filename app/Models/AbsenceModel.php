<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AbsenceModel extends Model
{

    protected $table = 'absence_reports'; //tabell namn i DB

    protected $fillable = [
        'employee_id',
        'date',
        'phone_number',
        'email',
        'reason',
        'absence_type',
        'absence_percentage_level',
        'absence_certificate',
        'absence_certificate_photos',
        'approval_by',
        'approval_date',
        'comments',
    ];

    protected $casts = [
        'absence_certificate_photos' => 'array',
    ];

}

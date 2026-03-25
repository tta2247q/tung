<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diploma extends Model
{
    protected $fillable = [
        'student_name',
        'student_id',
        'degree',
        'issue_date',
        'hash'
    ];
}

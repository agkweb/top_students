<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMajor extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'student_majors';

}
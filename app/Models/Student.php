<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'student_id';
    protected $fillable = [
        'first_name',
        'last_name',
        'class',
        'section',
        'roll_no',
        'email',
        'phone',
        'address',
        'dob',
        'profile_pic',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Punch extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'punch_id';

    // Define fillable properties to allow mass assignment
    protected $fillable = [
        'guardian_id',
        'punch_type',
        'punch_time',
    ];

    // Relationship with Guardian
    public function guardian()
    {
        return $this->belongsTo(Guardian::class, 'guardian_id', 'guardian_id');
    }
}

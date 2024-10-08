<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guardian extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'guardian_id';
    protected $fillable = ['user_id', 'name', 'phone', 'email'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

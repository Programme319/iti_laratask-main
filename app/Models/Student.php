<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
    'name', 'address', 'email', 'phone', 'gender', 'image', 'track_id',
];

    public function track()
    {
        return $this->belongsTo(Track::class);
    }
}
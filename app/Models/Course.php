<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function tracks()
    {
        return $this->hasMany(Track::class);
    }

    public function students()
    {
        return $this->hasManyThrough(Student::class, Track::class);
    }
    
}


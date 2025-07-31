<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Track extends Model
{
    use HasFactory;
    //
    protected $fillable = ['name', 'description', 'img', 'course_id'];

    public function students()
{
    return $this->hasMany(Student::class);
}

public function course()
{
    return $this->belongsTo(Course::class);
}



}



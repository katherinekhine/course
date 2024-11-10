<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description'];

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_students', 'course_id', 'user_id');
    }
}

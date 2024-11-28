<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'course_id', 'video', 'user_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

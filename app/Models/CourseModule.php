<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserProgress;
use App\Models\Course;

class CourseModule extends Model
{
    /** @use HasFactory<\Database\Factories\CourseModuleFactory> */
    use HasFactory;

     protected $table = 'course_modules';

    protected $fillable = [
        'course_id',
        'title',
        'type',
        'content',
        'order',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function progress()
    {
        return $this->hasMany(UserProgress::class);
    }
}

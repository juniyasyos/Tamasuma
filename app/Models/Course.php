<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'instructor_id',
    ];

    // Relasi ke User sebagai instruktur
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    // Relasi ke User sebagai mahasiswa (pivot)
    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user')
            ->withTimestamps()
            ->withPivot('enrolled_at', 'progress');

    }
}
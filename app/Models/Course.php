<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModule as Module;
use App\Models\Enrollment;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'is_active',
    ];

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
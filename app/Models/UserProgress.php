<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseModule as Module;
use App\Models\User;

class UserProgress extends Model
{
    /** @use HasFactory<\Database\Factories\UserProgressFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_module_id',
        'completed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
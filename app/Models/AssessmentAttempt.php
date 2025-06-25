<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Assessment;

class AssessmentAttempt extends Model
{
    /** @use HasFactory<\Database\Factories\AssessmentAttemptFactory> */
    use HasFactory;

     protected $fillable = [
        'assessment_id',
        'user_id',
        'score',
        'max_score',
        'answers',
        'started_at',
        'completed_at',
    ];

    protected $casts = [
        'answers' => 'array',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

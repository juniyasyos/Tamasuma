<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Assessment;

class AssessmentQuestion extends Model
{
    /** @use HasFactory<\Database\Factories\AssessmentQuestionFactory> */
    use HasFactory;

    protected $fillable = [
        'assessment_id',
        'question_text',
        'options',
        'correct_answer',
        'score',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class ContactChannel extends Model
{
    /** @use HasFactory<\Database\Factories\ContactChannelFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'type',
        'value',
        'is_primary',
    ];

    /**
     * Relation function to user models
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
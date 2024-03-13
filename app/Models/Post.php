<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'body' => 'array'
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'post_user', 'post_id', 'user_id');
    }
}

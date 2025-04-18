<?php

namespace App\Models;

use App\Models\User;
use App\Models\Upvote;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'user_id',
    ];

    public function upvote(): HasMany
    {
        return $this->hasMany(Upvote::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

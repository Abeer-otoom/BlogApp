<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'post_id',
        'user_id',
    ];

    public function post(): BelongsTo
    {
        return $this->BelongsTo(Post::class , 'post_id');
    }

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}

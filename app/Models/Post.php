<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['blog_id', 'title', 'content', 'image'];

    /**
     * Get the blog that owns the post.
     */
    public function blog(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     * Get the likes for the post.
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    /**
     * Get the comments for the post.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}

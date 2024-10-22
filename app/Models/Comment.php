<?php

namespace App\Models;

use Database\Factories\CommentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Znck\Eloquent\Relations\BelongsToThrough;
use Znck\Eloquent\Traits\BelongsToThrough as BelongsToThroughTrait;

class Comment extends Model
{
    /**
     * @use HasFactory<CommentFactory>
     **/
    use BelongsToThroughTrait,
        HasFactory;

    /**
     * @return BelongsToThrough<Country, $this>
     */
    public function country(): BelongsToThrough
    {
        return $this->belongsToThrough(Country::class, [User::class, Post::class]);
    }

    /**
     * @return BelongsTo<Post, $this>
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

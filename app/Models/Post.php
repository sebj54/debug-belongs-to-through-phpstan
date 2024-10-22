<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Znck\Eloquent\Relations\BelongsToThrough;
use Znck\Eloquent\Traits\BelongsToThrough as BelongsToThroughTrait;

class Post extends Model
{
    use BelongsToThroughTrait,
        HasFactory;

    public function country(): BelongsToThrough
    {
        return $this->belongsToThrough(Country::class, User::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

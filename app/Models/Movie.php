<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Movie extends Model
{
    /** @use HasFactory<\Database\Factories\MovieFactory> */
    use HasFactory;
    protected $guarded=[''];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}

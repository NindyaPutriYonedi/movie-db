<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //
    //  protected $fillable = [
    //     'category_name',
    //     'description', // tambahkan semua field yang diinput dari form
    // ];

    public function movie(): HasMany{
        return $this->hasMany(Movie::class);
    }
}

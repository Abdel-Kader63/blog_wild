<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [ "title", "picture", "content" ];

   // relation inverse
public function user(): BelongsTo
{
    return $this->belongsTo(User::class);
}

// Ajout
public function chirps(): HasMany
{
    return $this->hasMany(Chirp::class);
}
}



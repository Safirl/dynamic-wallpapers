<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wallpaper extends Model
{
    use HasFactory;
     //define fillables :
    protected $fillable = [
        'name',
        'is_public',
        'creator_id',
    ];

    public function creator(): BelongsTo {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function likedByUsers(): BelongsToMany {
        return $this->belongsToMany(User::class);
    }

    public function images(): HasMany {
        return $this->hasMany(Image::class);
    }
}

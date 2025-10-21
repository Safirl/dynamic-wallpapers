<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallpaper extends Model
{
     //define fillables :
    protected $fillable = [
        'name',
        'is_public',
        'creator_id',
    ];
}

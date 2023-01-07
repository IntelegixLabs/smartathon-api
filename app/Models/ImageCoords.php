<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCoords extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'unfixed_image',
        'x',
        'y',
        'w',
        'z',
        'pollution_id',
        'is_auto_uploaded',
        'is_fixed',
        'fixed_image',
        'admin_id'
    ];
}

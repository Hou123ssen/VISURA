<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visura extends Model
{
    protected $fillable = [
        'image_path',
        'photographer_name',
        'type',
    ];
}

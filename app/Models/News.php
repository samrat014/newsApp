<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',

        'category',
        'title',
        'content',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}

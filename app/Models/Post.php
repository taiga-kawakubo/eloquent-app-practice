<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "title",
        "content",
        "published_at",
    ];

    
    //キャストスする値
    protected $casts = [
        "published_at" => "datetime",
    ];
}

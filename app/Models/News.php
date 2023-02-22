<?php

namespace App\Models;

use App\Traits\UuidTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, UuidTrait;

    protected $guarded = ['null'];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}

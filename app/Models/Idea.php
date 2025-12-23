<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'parent_id',
        'version',
        'title',
        'background',
        'objectives',
        'scope',
        'limitations',
        'ai_assisted',
    ];

    protected $casts = [
        'objectives' => 'array',
        'scope' => 'array',
        'limitations' => 'array',
        'ai_assisted' => 'boolean',
    ];
}

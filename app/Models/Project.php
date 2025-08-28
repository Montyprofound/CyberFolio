<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'screenshot',
        'tools_used',
        'link'
    ];

    protected $casts = [
        'tools_used' => 'array'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'todo',
        'completed',
        'content',
        'location',
        'datetime',
        'list_id'
    ];

    protected $casts = [
        'datetime' => 'datetime',
    ];
}

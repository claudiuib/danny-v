<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use CrudTrait;
    
    protected $fillable = [
        'ip_address',
        'user_agent',
        'page_visited',
        'referrer',
        'country',
        'city',
        'is_unique',
        'last_visit',
        'visit_count'
    ];

    protected $casts = [
        'is_unique' => 'boolean',
        'last_visit' => 'datetime',
        'visit_count' => 'integer'
    ];
}

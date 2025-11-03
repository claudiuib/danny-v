<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use CrudTrait;
    
    protected $fillable = [
        'phone',
        'email',
        'location',
        'description',
        'is_active',
        'bullet_1',
        'bullet_2',
        'bullet_3',
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}

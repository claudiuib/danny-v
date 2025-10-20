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
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}

<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class MainPageContent extends Model
{
    use CrudTrait;
    
    protected $fillable = [
        'content',
        'services',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];
    
    // Accessor to convert services text to array
    public function getServicesArrayAttribute()
    {
        if (empty($this->services)) {
            return [];
        }
        return array_filter(array_map('trim', explode("\n", $this->services)));
    }
}

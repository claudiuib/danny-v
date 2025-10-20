<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use CrudTrait;
    
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'features',
        'icon',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];
    
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($service) {
            if (empty($service->sort_order)) {
                $service->sort_order = static::max('sort_order') + 1;
            }
        });
    }
    
    // Accessor to convert features text to array
    public function getFeaturesArrayAttribute()
    {
        if (empty($this->features)) {
            return [];
        }
        return array_filter(array_map('trim', explode("\n", $this->features)));
    }
}

<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use CrudTrait;
    protected $fillable = [
        'title',
        'description', 
        'image_path',
        'category',
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
        
        static::creating(function ($portfolio) {
            if (empty($portfolio->sort_order)) {
                $portfolio->sort_order = static::max('sort_order') + 1;
            }
        });
    }
}

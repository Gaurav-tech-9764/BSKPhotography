<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Event extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'event_date', 'location', 'cover_image', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
        'event_date' => 'date',
    ];

    protected static function booted(): void
    {
        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = Str::slug($event->title);
            }
        });
    }

    public function images(): HasMany
    {
        return $this->hasMany(EventImage::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}

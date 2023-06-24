<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model
{
    use HasFactory;

    protected $fillable = [
        'street_id',
        'walking_route_id',
        'number',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function walkingRoute(): BelongsTo
    {
        return $this->belongsTo(WalkingRoute::class);
    }

    public function street(): BelongsTo
    {
        return $this->belongsTo(Street::class);
    }

    public function weekStatuses(): HasMany
    {
        return $this->hasMany(WeekStatus::class);
    }
}

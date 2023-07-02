<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class House extends Model implements \Spatie\EloquentSortable\Sortable
{
    use HasFactory;
    use \Spatie\EloquentSortable\SortableTrait;

    protected $fillable = [
        'street_id',
        'walking_route_id',
        'number',
        'active',
    ];

    protected $with = [
        'street'
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

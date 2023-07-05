<?php

namespace App\Models;

use App\Models\House\Status;
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
        'status',
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

    public function houseNotes(): HasMany
    {
        return $this->hasMany(HouseNote::class);
    }

    protected function statusLabel(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: function() {
                return match($this->status) {
                    Status::Active->slug() => Status::Active->label(),
                    Status::InActive->slug() => Status::InActive->label(),
                };
            },
        );
    }

    protected function lastNote(): \Illuminate\Database\Eloquent\Casts\Attribute
    {
        return \Illuminate\Database\Eloquent\Casts\Attribute::make(
            get: function() {
                return $this->houseNotes()->latest()->first()?->note;
            },
        );
    }
}

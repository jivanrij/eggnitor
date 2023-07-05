<?php

namespace App\Models;

use App\Models\House\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeekStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id',
        'week',
        'year',
        'status',
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }

    public function scopeActiveHouses(Builder $query): void
    {
        $query->with(['house' => function (Builder $query) {
            $query->where('status', Status::Active->slug());
        }])->get();
    }
}

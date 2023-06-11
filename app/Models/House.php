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
        'street_part_id',
        'number',
    ];

    public function weekStatuses(): HasMany
    {
        return $this->hasMany(WeekStatus::class);
    }

    public function streetPart(): BelongsTo
    {
        return $this->belongsTo(StreetPart::class);
    }
}

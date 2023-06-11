<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeekStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id',
        'week',
        'status',
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }
}

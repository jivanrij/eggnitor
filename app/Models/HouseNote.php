<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HouseNote extends Model
{
    use HasFactory;

    protected $fillable = [
        'house_id',
        'note',
    ];

    public function house(): BelongsTo
    {
        return $this->belongsTo(House::class);
    }
}

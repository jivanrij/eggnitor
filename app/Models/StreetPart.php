<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StreetPart extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function houses(): HasMany
    {
        return $this->hasMany(House::class);
    }
}

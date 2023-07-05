<?php

namespace App\Models\House;

enum Status
{
    case Active;
    case InActive;

    public function label(): string
    {
        return match($this) {
            Status::Active => 'Actief',
            Status::InActive => 'Niet Actief',
        };
    }

    public function slug(): string
    {
        return match($this) {
            Status::Active => 'active',
            Status::InActive => 'in-active',
        };
    }
}

<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait AdminAttributes
{
    /**
     * @return Attribute
     */
    protected function fullName(): Attribute
    {
        return new Attribute(
            get: fn($value) => $this->first_name . ' ' . $this->last_name,
        );
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Country extends BaseModel
{
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, City::class);
    }
}

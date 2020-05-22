<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Staudenmeir\EloquentHasManyDeep\HasManyDeep;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

class Country extends BaseModel
{
    use HasRelationships;

    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(User::class, City::class);
    }

    public function posts(): HasManyDeep
    {
        return $this->hasManyDeep(Post::class, [City::class, User::class]);
    }

    public function comments(): HasManyDeep
    {
        return $this->hasManyDeepFromRelations(
            $this->posts(),
            (new Post())->comments()
        );
    }
}
